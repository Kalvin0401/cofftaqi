<?php

namespace App\Livewire\Admin\Kopi;

use Livewire\Component;
use App\Models\Kopi;

class Form extends Component
{
    /* =======================
     | PROPERTIES
     ======================= */
    public $kopiId = null;

    public $kode = '';
    public $nama = '';
    public $jenis = '';
    public $asal = '';
    public $stok_minimum = 0;
    public $status = true;

    /* =======================
     | MOUNT (LOAD DATA EDIT)
     ======================= */
    public function mount($id = null)
    {
        if ($id) {
            $kopi = Kopi::findOrFail($id);

            $this->kopiId = $kopi->id;
            $this->kode = $kopi->kode;
            $this->nama = $kopi->nama;
            $this->jenis = $kopi->jenis;
            $this->asal = $kopi->asal;
            $this->stok_minimum = $kopi->stok_minimum; // ✅ FIX DI SINI
            $this->status = (bool) $kopi->status;
        }
    }

    /* =======================
     | VALIDATION
     ======================= */
    protected function rules()
    {
        return [
            'kode' => 'required|unique:kopis,kode,' . ($this->kopiId ?? 'NULL') . ',id',
            'nama' => 'required|string|min:3',
            'jenis' => 'required|string',
            'asal' => 'nullable|string',
            'stok_minimum' => 'required|integer|min:0',
            'status' => 'boolean',
        ];
    }

    protected $messages = [
        'kode.required' => 'Kode kopi wajib diisi',
        'kode.unique' => 'Kode sudah digunakan',
        'nama.required' => 'Nama kopi wajib diisi',
        'jenis.required' => 'Jenis wajib dipilih',
        'stok_minimum.required' => 'Stok minimum wajib diisi',
        'stok_minimum.integer' => 'Stok minimum harus angka',
    ];

    /* =======================
     | SAVE DATA
     ======================= */
    public function save()
{
    try {

        $validated = $this->validate();

        Kopi::updateOrCreate(
            ['id' => $this->kopiId],
            $validated
        );

        $this->dispatch('saved', [
            'message' => 'Data kopi berhasil disimpan',
            'url' => route('admin.kopi.index')
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {

        $this->dispatch('validation-error', [
            'message' => collect($e->validator->errors()->all())->first()
        ]);

       return;
    }
}

    /* =======================
     | RENDER
     ======================= */
    public function render()
    {
        return view('livewire.admin.kopi.form');
    }
}