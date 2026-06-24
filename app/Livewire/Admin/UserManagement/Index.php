<?php

namespace App\Livewire\Admin\UserManagement;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $deleteId;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->dispatch('confirm-delete', id: $id);
    }

    #[On('deleteUser')]
    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Proteksi 1: tidak boleh hapus diri sendiri
        if ($user->id === Auth::id()) {
            $this->dispatch('error-delete', message: 'Akun admin tidak bisa dihapus!');
            return;
        }

        // Proteksi 2: tidak boleh hapus admin terakhir
        $jumlahAdmin = User::where('role', 'admin')->count();
        if ($user->role === 'admin' && $jumlahAdmin <= 1) {
            $this->dispatch('error-delete', message: 'Akun admin tidak bisa dihapus!');
            return;
        }

        $user->delete();
        $this->dispatch('deleted');
    }

    public function render()
    {
        return view('livewire.admin.user-management.index', [
            'users' => User::orderBy('name')->get(),
        ]);
    }
}