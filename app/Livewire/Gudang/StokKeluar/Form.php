<?php

namespace App\Livewire\Gudang\StokKeluar;

use Livewire\Component;
use App\Models\Kopi;
use App\Models\StokKeluar;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $stokKeluarId;

    public $kopi_id;
    public $tanggal;
    public $jumlah;
    public $harga_perkilo;
    public $total = 0;
    public $tujuan;
    public $keterangan;

    public $stokTersedia = 0;
    protected $messages = [
    'kopi_id.required' => 'Kopi wajib dipilih',
    'tanggal.required' => 'Tanggal wajib diisi',

    'jumlah.required' => 'Jumlah harap diisi',
    'jumlah.not_in' => 'Jumlah harap diisi',

    'harga_perkilo.required' => 'Harga per kilo harap diisi',
    'harga_perkilo.not_in' => 'Harga per kilo harap diisi',
    'tujuan.required' => 'Tujuan harap diisi',
];

    public function mount($id = null)
    {
        if ($id) {
            $row = StokKeluar::findOrFail($id);

            $this->stokKeluarId = $row->id;
            $this->kopi_id = $row->kopi_id;
            $this->tanggal = \Carbon\Carbon::parse($row->tanggal)->format('Y-m-d\TH:i');
            $this->jumlah = $row->jumlah;
            $this->harga_perkilo = $row->harga_perkilo;
            $this->total = $row->total;
            $this->tujuan = $row->tujuan;
            $this->keterangan = $row->keterangan;

            $this->stokTersedia = $this->hitungStokTersedia();
        } else {
            $this->tanggal = now()->format('Y-m-d\TH:i');
        }
    }

    protected function rules()
    {
        return [
            'kopi_id' => 'required|exists:kopis,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|not_in:0',
            'harga_perkilo' => 'required|numeric|not_in:0',
            'tujuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ];
    }

    public function updated($field)
    {
        if (in_array($field, ['jumlah', 'harga_perkilo'])) {
            $this->total = ($this->jumlah ?? 0) * ($this->harga_perkilo ?? 0);
        }

        if ($field === 'jumlah') {
            $this->stokTersedia = $this->hitungStokTersedia();

            if ($this->jumlah > $this->stokTersedia) {
                $this->addError('jumlah', 'Jumlah melebihi stok (' . $this->stokTersedia . ')');
            } else {
                $this->resetErrorBag('jumlah');
            }
        }

        if ($field === 'kopi_id') {
            $this->stokTersedia = $this->hitungStokTersedia();
        }
    }

    private function hitungStokTersedia()
{
    if (!$this->kopi_id) return 0;

    $kopi = Kopi::find($this->kopi_id);
    if (!$kopi) return 0;

    $stok = $kopi->stok;

    // kalau edit, balikin dulu stok lama
    if ($this->stokKeluarId) {
        $old = StokKeluar::find($this->stokKeluarId);

        if ($old && $old->kopi_id == $this->kopi_id) {
            $stok += $old->jumlah;
        }
    }

    return $stok;
}

public function save()
{
    try {

        $this->validate();

    } catch (\Illuminate\Validation\ValidationException $e) {

        $this->dispatch('validation-error', [
            'message' => collect($e->validator->errors()->all())->first()
        ]);

        return;
    }

    // ========================
    // VALIDASI DULU (LUAR TRANSACTION)
    // ========================
    if ($this->stokKeluarId) {

        $old = StokKeluar::findOrFail($this->stokKeluarId);
        $kopiBaru = Kopi::findOrFail($this->kopi_id);

        $stokTersedia = $kopiBaru->stok;

        if ($old->kopi_id == $this->kopi_id) {
            $stokTersedia += $old->jumlah;
        }

        if ($stokTersedia < $this->jumlah) {
            $this->dispatch('swal:error', [
                'title' => 'Gagal!',
                'text' => 'Jumlah melebihi stok (' . $stokTersedia . ')'
            ]);
            return;
        }

    } else {

        $kopiBaru = Kopi::findOrFail($this->kopi_id);

        if ($kopiBaru->stok < $this->jumlah) {
            $this->dispatch('swal:error', [
                'title' => 'Gagal!',
                'text' => 'Jumlah melebihi stok (' . $kopiBaru->stok . ')'
            ]);
            return;
        }
    }

    // ========================
    // PROSES SIMPAN
    // ========================
    DB::transaction(function () {

        $this->total = ($this->jumlah ?? 0) * ($this->harga_perkilo ?? 0);

        if ($this->stokKeluarId) {

            $old = StokKeluar::findOrFail($this->stokKeluarId);

            // kembalikan stok lama
            $kopiLama = Kopi::findOrFail($old->kopi_id);
            $kopiLama->increment('stok', $old->jumlah);

            // kurangi stok baru
            $kopiBaru = Kopi::findOrFail($this->kopi_id);
            $kopiBaru->decrement('stok', $this->jumlah);

            // update data
            $old->update([
                'kopi_id' => $this->kopi_id,
                'tanggal' => $this->tanggal,
                'jumlah' => $this->jumlah,
                'harga_perkilo' => $this->harga_perkilo,
                'total' => $this->total,
                'tujuan' => $this->tujuan,
                'keterangan' => $this->keterangan,
            ]);

        } else {

            $kopiBaru = Kopi::findOrFail($this->kopi_id);

            StokKeluar::create([
                'kopi_id' => $this->kopi_id,
                'tanggal' => $this->tanggal,
                'jumlah' => $this->jumlah,
                'harga_perkilo' => $this->harga_perkilo,
                'total' => $this->total,
                'tujuan' => $this->tujuan,
                'keterangan' => $this->keterangan,
            ]);

            $kopiBaru->decrement('stok', $this->jumlah);
        }
    });

    // ========================
    // SUCCESS ALERT
    // ========================
    $this->dispatch('saved', [
        'message' => $this->stokKeluarId
            ? 'Stok keluar berhasil diperbarui'
            : 'Stok keluar berhasil ditambahkan',
        'url' => route('gudang.stok-keluar.index')
    ]);
}

    public function render()
    {
        return view('livewire.gudang.stok-keluar.form', [
            'kopis' => Kopi::orderBy('nama')->get(),
        ]);
    }
}