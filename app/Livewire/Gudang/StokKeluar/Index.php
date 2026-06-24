<?php

namespace App\Livewire\Gudang\StokKeluar;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StokKeluar;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class Index extends Component
{
    use WithPagination;

    public $deleteId;
    public $search = '';

    /* =========================
     | KONFIRMASI HAPUS
     ========================= */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    /* =========================
     | HAPUS DATA
     ========================= */
    #[On('deleteConfirmed')]
    public function delete()
    {
        DB::transaction(function () {

            $row = StokKeluar::findOrFail($this->deleteId);

            // kembalikan stok
            $row->kopi->increment('stok', $row->jumlah);

            $row->delete();
        });

        $this->dispatch('deleted');
    }

    /* =========================
     | RENDER
     ========================= */
    public function render()
    {
        return view('livewire.gudang.stok-keluar.index', [
            'data' => StokKeluar::with('kopi')

    ->where(function ($query) {

        $query->whereHas('kopi', function ($q) {
            $q->where('nama', 'like', '%' . $this->search . '%');
        })

        ->orWhere('tujuan', 'like', '%' . $this->search . '%')

        ->orWhere('keterangan', 'like', '%' . $this->search . '%')

        ->orWhere('tanggal', 'like', '%' . $this->search . '%');

    })

    ->orderBy('tanggal', 'desc')

    ->paginate(10),
        ]);
    }
}