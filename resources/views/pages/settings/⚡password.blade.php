<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

new class extends Component {

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function updatePassword()
{
    // PASSWORD SAAT INI KOSONG
    if (!$this->current_password) {

        $this->dispatch(
            'swal',
            icon: 'error',
            title: 'Gagal',
            text: 'Password saat ini wajib diisi.'
        );

        return;
    }

    // PASSWORD SAAT INI SALAH
    if (!Hash::check($this->current_password, Auth::user()->password)) {

        $this->dispatch(
            'swal',
            icon: 'error',
            title: 'Gagal',
            text: 'Password saat ini salah.'
        );

        return;
    }

    // PASSWORD BARU KOSONG
    if (!$this->password) {

        $this->dispatch(
            'swal',
            icon: 'error',
            title: 'Gagal',
            text: 'Password baru wajib diisi.'
        );

        return;
    }

    // PASSWORD MINIMAL
    if (strlen($this->password) < 8) {

        $this->dispatch(
            'swal',
            icon: 'error',
            title: 'Gagal',
            text: 'Password minimal 8 karakter.'
        );

        return;
    }

    // KONFIRMASI PASSWORD
    if ($this->password !== $this->password_confirmation) {

        $this->dispatch(
            'swal',
            icon: 'error',
            title: 'Gagal',
            text: 'Konfirmasi password tidak cocok.'
        );

        return;
    }

    // UPDATE PASSWORD
    Auth::user()->update([
        'password' => Hash::make($this->password)
    ]);

    // RESET FORM
    $this->reset(
        'current_password',
        'password',
        'password_confirmation'
    );

    // BERHASIL
    $this->dispatch(
        'swal',
        icon: 'success',
        title: 'Berhasil',
        text: 'Password berhasil diperbarui.'
    );
}
};

?>

<section class="w-full">

    <div class="relative mb-6 w-full">

        <flux:heading size="xl" level="1">
            Pengaturan
        </flux:heading>

        <flux:subheading size="lg" class="mb-6">
            Kelola profil dan pengaturan akun
        </flux:subheading>

        <flux:separator variant="subtle" />

    </div>

    <x-pages::settings.layout
        heading="Ubah Password"
        subheading="Gunakan password yang aman untuk akun Anda"
    >

        <form wire:submit="updatePassword" class="mt-6 space-y-6">

            <flux:input
                wire:model="current_password"
                label="Password Saat Ini"
                type="password"
            />

            <flux:input
                wire:model="password"
                label="Password Baru"
                type="password"
            />

            <flux:input
                wire:model="password_confirmation"
                label="Konfirmasi Password"
                type="password"
            />

            <flux:button
                type="submit"
                variant="primary"
                class="w-full"
            >
                Simpan Password
            </flux:button>

        </form>

    </x-pages::settings.layout>

</section>

{{-- SWEET ALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('livewire:init', () => {

        Livewire.on('swal', (event) => {

            Swal.fire({
                icon: event.icon,
                title: event.title,
                html: event.text,
                confirmButtonColor: '#3085d6',
            });

        });

    });
</script>