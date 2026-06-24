<?php

use App\Concerns\PasswordValidationRules;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component {
    use PasswordValidationRules;

    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => $this->currentPasswordRules(),
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">

    @if(auth()->user()->role !== 'admin')

        <div class="relative mb-5">
            <flux:heading>{{ __('Hapus Akun') }}</flux:heading>
            <flux:subheading>
                {{ __('Hapus akun beserta seluruh data terkait') }}
            </flux:subheading>
        </div>

        <flux:modal.trigger name="confirm-user-deletion">
            <flux:button
                variant="danger"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                data-test="delete-user-button"
            >
                {{ __('Hapus Akun') }}
            </flux:button>
        </flux:modal.trigger>

        <flux:modal
            name="confirm-user-deletion"
            :show="$errors->isNotEmpty()"
            focusable
            class="max-w-lg"
        >
            <form method="POST" wire:submit="deleteUser" class="space-y-6">

                <div>
                    <flux:heading size="lg">
                        {{ __('Apakah Anda yakin ingin menghapus akun ini?') }}
                    </flux:heading>

                    <flux:subheading>
                        {{ __('Setelah akun dihapus, seluruh data akan terhapus permanen. Masukkan password untuk mengonfirmasi penghapusan akun.') }}
                    </flux:subheading>
                </div>

                <flux:input
                    wire:model="password"
                    :label="__('Password')"
                    type="password"
                />

                <div class="flex justify-end space-x-2 rtl:space-x-reverse">

                    <flux:modal.close>
                        <flux:button variant="filled">
                            {{ __('Batal') }}
                        </flux:button>
                    </flux:modal.close>

                    <flux:button
                        variant="danger"
                        type="submit"
                        data-test="confirm-delete-user-button"
                    >
                        {{ __('Hapus Akun') }}
                    </flux:button>

                </div>

            </form>
        </flux:modal>

    @endif

</section>