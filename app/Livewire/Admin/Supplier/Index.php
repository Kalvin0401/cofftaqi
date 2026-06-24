<?php

namespace App\Livewire\Admin\Supplier;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $deleteId;
    public string $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->dispatch('confirm-delete', id: $id);
    }

    #[On('deleteSupplier')]
    public function delete($id)
    {
        $supplier = Supplier::findOrFail($id);

        if ($supplier->stokMasuks()->count() > 0) {
            $this->dispatch('error-delete', message: 'Supplier masih digunakan di stok masuk!');
            return;
        }

        $supplier->delete();

        $this->dispatch('deleted');
    }

    public function render()
    {
        $suppliers = Supplier::query()
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('telepon', 'like', '%' . $this->search . '%')
            ->orWhere('alamat', 'like', '%' . $this->search . '%')
            ->orWhere('keterangan', 'like', '%' . $this->search . '%')
            ->orderBy('nama')
            ->paginate(10);

        return view('livewire.admin.supplier.index', compact('suppliers'));
    }
}