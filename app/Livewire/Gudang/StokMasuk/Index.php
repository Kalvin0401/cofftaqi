<?php

namespace App\Livewire\Gudang\StokMasuk;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StokMasuk;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Index extends Component
{
    use WithPagination;
    public $deleteId;
    public $search = '';
    
    /* ===================================
     | KONFIRMASI HAPUS
     =================================== */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;

        $this->dispatch('show-delete-confirmation');
    }

    /* ===================================
     | DELETE SETELAH KONFIRMASI
     =================================== */
    #[On('deleteConfirmed')]
    public function delete()
    {
        DB::transaction(function () {

            $row = StokMasuk::findOrFail($this->deleteId);

            // kurangi stok kopi
            $row->kopi->decrement('stok', $row->jumlah);

            $row->delete();
        });

        $this->dispatch('deleted');
    }

    /* ===================================
     | RENDER
     =================================== */
    public function render()
    {
    return view('livewire.gudang.stok-masuk.index', [

        'data' => StokMasuk::with(['kopi', 'user', 'supplier'])

             ->where(function ($query) {

                // cari nama kopi
                $query->whereHas('kopi', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                })

                // cari supplier
                ->orWhereHas('supplier', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                })

                // cari sumber manual
                ->orWhere('sumber_nama', 'like', '%' . $this->search . '%')

                // cari tanggal
                ->orWhere('tanggal', 'like', '%' . $this->search . '%')

                // cari keterangan
                ->orWhere('keterangan', 'like', '%' . $this->search . '%');

            })

            ->orderBy('tanggal', 'desc')

            ->paginate(10),

    ]);
    }
}