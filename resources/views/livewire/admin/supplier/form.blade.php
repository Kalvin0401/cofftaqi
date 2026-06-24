<div class="max-w-2xl mx-auto" style="padding-bottom: 24px;">

    {{-- PAGE HEADER --}}
    <div style="display:flex; align-items:center; gap:8px; margin-bottom:14px;">
        <div style="background-color:#e1f5ee; width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:16px;height:16px;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1b4332">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
        </div>
        <div>
            <h1 style="font-size:1rem; font-weight:700; margin:0; color:#111827; line-height:1.3;">
                {{ $supplierId ? 'Edit Supplier' : 'Tambah Supplier' }}
            </h1>
            <p style="font-size:0.72rem; color:#9ca3af; margin:1px 0 0 0;">
                {{ $supplierId ? 'Perbarui data supplier' : 'Tambah supplier baru ke sistem' }}
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

        {{-- SECTION 1: IDENTITAS SUPPLIER --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:8px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Identitas Supplier</span>
            </div>
            <div>
                <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Nama Supplier <span style="color:#ef4444;">*</span></label>
                <flux:input wire:model="nama" />
            </div>
        </div>

        {{-- SECTION 2: KONTAK --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:8px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Kontak</span>
            </div>
            <div style="display:table; width:100%; border-collapse:separate; border-spacing:12px 0;">
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Telepon <span style="color:#ef4444;">*</span></label>
                    <flux:input wire:model="telepon" />
                </div>
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Email <span style="color:#ef4444;">*</span></label>
                    <flux:input wire:model="email" type="email" />
                </div>
            </div>
        </div>

        {{-- SECTION 3: ALAMAT & KETERANGAN --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:14px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Alamat & Keterangan</span>
            </div>
            <div style="margin-bottom:10px;">
                <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Alamat <span style="color:#ef4444;">*</span></label>
                <flux:input wire:model="alamat" />
            </div>
            <div>
                <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Keterangan</label>
                <flux:input wire:model="keterangan" />
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div style="display:flex; justify-content:flex-end; align-items:center; gap:7px;">
            <a href="{{ route('admin.supplier.index') }}">
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