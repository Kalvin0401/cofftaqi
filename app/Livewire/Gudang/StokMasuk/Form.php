<?php

namespace App\Livewire\Gudang\StokMasuk;

use Livewire\Component;
use App\Models\Kopi;
use App\Models\StokMasuk;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $stokMasukId;

    public $kopi_id;
    public $tanggal;
    public $jumlah;
    public $harga_perkilo;
    public $total = 0;
    public $keterangan; 

    public $sumber_type;
    public $supplier_id;
    public $sumber_nama;

    public $suppliers;
    protected $messages = [
        'kopi_id.required' => 'Kopi wajib dipilih',
        'tanggal.required' => 'Tanggal wajib diisi',
        'jumlah.required' => 'Jumlah wajib diisi',
        'harga_perkilo.required' => 'Harga per kilo wajib diisi',
        'sumber_type.required' => 'Sumber wajib dipilih',
        'supplier_id.required_if' => 'Supplier wajib dipilih',
        'sumber_nama.required_if' => 'Nama sumber wajib diisi',
    ];
        public function mount($id = null)
    {
        $this->tanggal = now()->format('Y-m-d\TH:i');

        $this->suppliers = Supplier::orderBy('nama')->get();

        if ($id) {
            $row = StokMasuk::findOrFail($id);

            $this->stokMasukId = $row->id;
            $this->kopi_id = $row->kopi_id;

            $this->tanggal = \Carbon\Carbon::parse($row->tanggal)
                ->format('Y-m-d\TH:i');
            $this->jumlah = $row->jumlah;
            $this->harga_perkilo = $row->harga_perkilo;
            $this->total = $row->total;
            $this->keterangan = $row->keterangan;
            $this->sumber_type = $row->sumber_type;
            $this->supplier_id = $row->supplier_id;
            $this->sumber_nama = $row->sumber_nama;
        }
    }

    protected function rules()
    {
        return [
            'kopi_id' => 'required|exists:kopis,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
            'harga_perkilo' => 'required|numeric|min:0',
            'total' => 'nullable|numeric',
            'keterangan' => 'nullable|string|max:255',
            'sumber_type' => 'required|in:supplier,petani,toke,lainnya',

            'supplier_id' => 'required_if:sumber_type,supplier|nullable|exists:suppliers,id',
            'sumber_nama' => 'required_if:sumber_type,petani,toke,lainnya|nullable|string|max:255',
        ];
    }

    // 🔥 AUTO HITUNG
    // 🔥 AUTO HITUNG
public function updatedJumlah()
{
    $this->hitungTotal();
}

public function updatedHargaPerkilo()
{
    $this->hitungTotal();
}

public function hitungTotal()
{
    $this->total = ($this->jumlah ?? 0) * ($this->harga_perkilo ?? 0);
}
    public function save()
{
   if (!$this->kopi_id) {
        $this->dispatch('validation-error', [
            'message' => 'Kopi wajib dipilih'
        ]);
        return;
    }

    if (!$this->tanggal) {
        $this->dispatch('validation-error', [
            'message' => 'Tanggal wajib diisi'
        ]);
        return;
    }

    if (!$this->jumlah) {
        $this->dispatch('validation-error', [
            'message' => 'Jumlah wajib diisi'
        ]);
        return;
    }

    if (!$this->harga_perkilo) {
        $this->dispatch('validation-error', [
            'message' => 'Harga per kilo wajib diisi'
        ]);
        return;
    }

    if (!$this->sumber_type) {
        $this->dispatch('validation-error', [
            'message' => 'Sumber wajib dipilih'
        ]);
        return;
    }

    if ($this->sumber_type === 'supplier' && !$this->supplier_id) {
        $this->dispatch('validation-error', [
            'message' => 'Supplier wajib dipilih'
        ]);
        return;
    }

    if ($this->sumber_type !== 'supplier' && !$this->sumber_nama) {
        $this->dispatch('validation-error', [
            'message' => 'Nama sumber wajib diisi'
        ]);
        return;
    }

    $this->validate();


    DB::transaction(function () {

        $this->total = ($this->jumlah ?? 0) * ($this->harga_perkilo ?? 0);

        $supplierId = null;
        $sumberNama = null;

        if ($this->sumber_type === 'supplier') {
            $supplierId = $this->supplier_id;
        } else {
            $sumberNama = $this->sumber_nama;
        }

        if ($this->stokMasukId) {

            $old = StokMasuk::findOrFail($this->stokMasukId);

            $old->kopi->decrement('stok', $old->jumlah);

            $old->update([
                'kopi_id' => $this->kopi_id,
                'tanggal' => $this->tanggal,
                'jumlah' => $this->jumlah,
                'harga_perkilo' => $this->harga_perkilo,
                'total' => $this->total,
                'keterangan' => $this->keterangan,
                'supplier_id' => $supplierId,
                'sumber_type' => $this->sumber_type,
                'sumber_nama' => $sumberNama,
            ]);

            Kopi::find($this->kopi_id)->increment('stok', $this->jumlah);

        } else {

            StokMasuk::create([
                'kopi_id' => $this->kopi_id,
                'tanggal' => $this->tanggal,
                'jumlah' => $this->jumlah,
                'harga_perkilo' => $this->harga_perkilo,
                'total' => $this->total,
                'keterangan' => $this->keterangan,
                'supplier_id' => $supplierId,
                'sumber_type' => $this->sumber_type,
                'sumber_nama' => $sumberNama,
                'user_id' => Auth::id(),
            ]);

            Kopi::find($this->kopi_id)->increment('stok', $this->jumlah);
        }
    });

    $this->dispatch('saved', [
        'url' => route('gudang.stok-masuk.index'),
        'message' => $this->stokMasukId
            ? 'Stok masuk berhasil diupdate'
            : 'Stok masuk berhasil ditambahkan'
    ]);
}

    public function render()
    {
        return view('livewire.gudang.stok-masuk.form', [
            'kopis' => Kopi::orderBy('nama')->get(),
        ]);
    }
}