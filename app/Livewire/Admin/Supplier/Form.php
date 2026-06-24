<?php

namespace App\Livewire\Admin\Supplier;

use Livewire\Component;
use App\Models\Supplier;

class Form extends Component
{
    public $supplierId;
    public $nama, $alamat, $email, $telepon, $keterangan;

    public function mount($id = null)
    {
        if ($id) {
            $supplier = Supplier::findOrFail($id);

            $this->supplierId = $supplier->id;
            $this->nama = $supplier->nama;
            $this->alamat = $supplier->alamat;
            $this->email = $supplier->email;
            $this->telepon = $supplier->telepon;
            $this->keterangan = $supplier->keterangan;
        }
    }

   public function save()
{
    try {

        $this->validate(
    [
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'email' => 'required|email',
        'alamat' => 'required|string',
    ],
    [
        'nama.required' => 'Nama supplier wajib diisi',
        'telepon.required' => 'Telepon wajib diisi',
        'telepon.max' => 'Telepon maksimal 20 karakter',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'alamat.required' => 'Alamat wajib diisi',
    ]
);

        Supplier::updateOrCreate(
            ['id' => $this->supplierId],
            [
                'nama' => $this->nama,
                'alamat' => $this->alamat,
                'email' => $this->email,
                'telepon' => $this->telepon,
                'keterangan' => $this->keterangan,
            ]
        );

        $this->dispatch('saved', [
            'message' => 'Data supplier berhasil disimpan',
            'url' => route('admin.supplier.index')
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {

        $this->dispatch('validation-error', [
            'message' => collect($e->validator->errors()->all())->first()
        ]);

        return;
    }
}
    public function render()
    {
        return view('livewire.admin.supplier.form');
    }
}