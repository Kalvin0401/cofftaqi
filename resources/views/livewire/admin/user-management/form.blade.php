<div class="max-w-2xl mx-auto" style="padding-bottom: 24px;">

    {{-- PAGE HEADER --}}
    <div style="display:flex; align-items:center; gap:8px; margin-bottom:14px;">
        <div style="background-color:#f5f3ff; width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#5b21b6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <div>
            <h1 style="font-size:1rem; font-weight:700; margin:0; color:#111827; line-height:1.3;">
                {{ $userId ? 'Edit User' : 'Tambah User' }}
            </h1>
            <p style="font-size:0.72rem; color:#9ca3af; margin:1px 0 0 0;">
                {{ $userId ? 'Perbarui data akun pengguna' : 'Buat akun pengguna baru' }}
            </p>
        </div>
    </div>

    <style>
        .btn-action {
            transition: transform 0.1s ease, box-shadow 0.1s ease, background-color 0.15s ease;
        }
        .btn-action:active {
            transform: scale(0.94) translateY(1px);
            box-shadow: 0 1px 2px rgba(0,0,0,0.08) !important;
        }
        .btn-cancel:hover { background-color: #f3f4f6 !important; }
        .btn-save:hover   { background-color: #14532d !important; }
    </style>

    <form wire:submit.prevent="save" novalidate>

        {{-- SECTION 1: INFORMASI AKUN --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:8px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Informasi Akun</span>
            </div>
            <div style="display:table; width:100%; border-collapse:separate; border-spacing:12px 0;">
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Nama <span style="color:#ef4444;">*</span></label>
                    <flux:input wire:model="name" placeholder=" " />
                </div>
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Email <span style="color:#ef4444;">*</span></label>
                    <flux:input wire:model="email" type="email" placeholder=" " />
                </div>
            </div>
        </div>

        {{-- SECTION 2: KEAMANAN --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:8px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Keamanan</span>
            </div>
            <div>
                <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Password <span style="color:#ef4444;">*</span></label>
                <flux:input
                    wire:model="password"
                    type="password"
                    placeholder="{{ $userId ? 'Kosongkan jika tidak diubah' : '' }}"
                />
                @if($userId)
                    <p style="font-size:0.65rem; color:#9ca3af; margin:4px 0 0 0;">Biarkan kosong jika tidak ingin mengubah password</p>
                @endif
            </div>
        </div>

        {{-- SECTION 3: HAK AKSES --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:14px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Hak Akses</span>
            </div>

            {{-- Role: kalau admin tampilkan teks saja, tidak bisa diubah --}}
            @if($role === 'admin')
                <div>
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Role</label>
                    <input type="text" value="Admin" disabled
                        class="w-full px-3 py-2 rounded-lg border border-zinc-200 bg-zinc-100 text-zinc-500 text-sm cursor-not-allowed">
                    <p style="font-size:0.65rem; color:#9ca3af; margin:4px 0 0 0;">Role admin tidak bisa diubah</p>
                </div>
            @else
                <div>
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Role <span style="color:#ef4444;">*</span></label>
                    <flux:select wire:model="role">
                        <option value="staf_gudang">Petugas Gudang</option>
                    </flux:select>
                </div>
            @endif
        </div>

        {{-- ACTION BUTTONS --}}
        <div style="display:flex; justify-content:flex-end; align-items:center; gap:7px;">
            <a href="{{ route('admin.user.index') }}">
                <button type="button" class="btn-action btn-cancel" style="padding:7px 18px; font-size:0.78rem; font-weight:600; border-radius:7px; border:1.5px solid #d1d5db; background-color:#f9fafb; color:#374151; cursor:pointer; line-height:1; box-shadow:0 1px 2px rgba(0,0,0,0.05);">
                    Batal
                </button>
            </a>
            <button type="submit" class="btn-action btn-save" style="display:inline-flex; align-items:center; gap:5px; padding:7px 18px; font-size:0.78rem; font-weight:600; border-radius:7px; border:none; background-color:#1b4332; color:#fff; cursor:pointer; line-height:1; box-shadow:0 1px 3px rgba(27,67,50,0.22);">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:12px;height:12px;" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                Simpan
            </button>
        </div>

    </form>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('validation-error', (event) => {
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                text: event[0].message,
                confirmButtonColor: '#4F8B6A'
            });
        });
    });
</script>