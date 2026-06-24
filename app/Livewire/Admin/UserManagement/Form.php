<?php

namespace App\Livewire\Admin\UserManagement;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Form extends Component
{
    public $userId;
    public $name = '';
    public $email = '';
    public $password = '';
    public $role = 'staf_gudang';

    public function mount($id = null)
    {
        if ($id) {
            $user = User::findOrFail($id);
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
        }
    }

    public function save()
    {
        try {

            $validated = $this->validate(
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email,' . ($this->userId ?? 'NULL') . ',id',
                    'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
                    'role' => 'required|in:admin,staf_gudang',
                ],
                [
                    'name.required' => 'Nama wajib diisi',
                    'email.required' => 'Email wajib diisi',
                    'email.email' => 'Format email tidak valid',
                    'email.unique' => 'Email sudah digunakan',
                    'password.required' => 'Password wajib diisi',
                    'password.min' => 'Password minimal 6 karakter',
                    'role.required' => 'Role wajib dipilih',
                ]
            );

            if ($this->password) {
                $validated['password'] = Hash::make($this->password);
            } else {
                unset($validated['password']);
            }

            // Proteksi: role admin tidak bisa diubah lewat form
            if ($this->userId) {
                $existingUser = User::findOrFail($this->userId);
                if ($existingUser->role === 'admin') {
                    $validated['role'] = 'admin';
                }
            }

            User::updateOrCreate(
                ['id' => $this->userId],
                $validated
            );

            $this->dispatch('saved', [
                'message' => 'User berhasil disimpan',
                'url' => route('admin.user.index')
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
        return view('livewire.admin.user-management.form');
    }
}