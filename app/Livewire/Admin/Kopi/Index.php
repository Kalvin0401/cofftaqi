<?php

namespace App\Livewire\Admin\Kopi;

use Livewire\Component;
use App\Models\Kopi;
use Livewire\Attributes\On;

class Index extends Component
{
    public $deleteId;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;

        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function delete()
    {
        Kopi::findOrFail($this->deleteId)->delete();

        $this->deleteId = null;

        $this->dispatch('deleted');
    }

    public function render()
    {
        return view('livewire.admin.kopi.index', [
            'kopis' => Kopi::orderBy('id')->get(),
        ]);
    }
}