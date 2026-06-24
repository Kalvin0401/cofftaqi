<div class="max-w-2xl mx-auto" style="padding-bottom: 24px;">

    {{-- PAGE HEADER --}}
    <div style="display:flex; align-items:center; gap:8px; margin-bottom:14px;">
        <div style="background-color:#e1f5ee; width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
            <svg style="width:16px;height:16px;flex-shrink:0;" viewBox="0 0 32 32" fill="#1b4332" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="10" cy="16" rx="7" ry="10" transform="rotate(-20 10 16)"/>
                <ellipse cx="10" cy="16" rx="2" ry="8" transform="rotate(-20 10 16)" fill="#fff" opacity="0.45"/>
                <ellipse cx="22" cy="16" rx="7" ry="10" transform="rotate(20 22 16)"/>
                <ellipse cx="22" cy="16" rx="2" ry="8" transform="rotate(20 22 16)" fill="#fff" opacity="0.45"/>
            </svg>
        </div>
        <div>
            <h1 style="font-size:1rem; font-weight:700; margin:0; color:#111827; line-height:1.3;">
                {{ $kopiId ? 'Edit Kopi' : 'Tambah Kopi' }}
            </h1>
            <p style="font-size:0.72rem; color:#9ca3af; margin:1px 0 0 0;">
                {{ $kopiId ? 'Perbarui data master kopi' : 'Tambah data kopi baru ke sistem' }}
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

    <form wire:submit.prevent="save">

        {{-- SECTION 1: IDENTITAS KOPI --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:8px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Identitas Kopi</span>
            </div>
            <div style="display:table; width:100%; border-collapse:separate; border-spacing:12px 0;">
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Kode Kopi <span style="color:#ef4444;">*</span></label>
                    <flux:input wire:model="kode" placeholder=" " />
                </div>
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Nama Kopi <span style="color:#ef4444;">*</span></label>
                    <flux:input wire:model="nama" placeholder=" " />
                </div>
            </div>
        </div>

        {{-- SECTION 2: DETAIL KOPI --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:8px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Detail Kopi</span>
            </div>
            <div style="display:table; width:100%; border-collapse:separate; border-spacing:12px 0;">
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Jenis <span style="color:#ef4444;">*</span></label>
                    <flux:select wire:model="jenis">
                        <option value="">-- Pilih --</option>
                        <option>Arabika</option>
                        <option>Robusta</option>
                    </flux:select>
                </div>
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Asal <span style="color:#ef4444;">*</span></label>
                    <flux:input wire:model="asal" placeholder=" " />
                </div>
            </div>
        </div>

        {{-- SECTION 3: STOK --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:14px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Batas Stok</span>
            </div>
            <div style="max-width:50%; padding-right:6px;">
                <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Stok Minimum <span style="color:#ef4444;">*</span></label>
                <flux:input type="number" wire:model="stok_minimum" placeholder=" " />
                <p style="font-size:0.65rem; color:#9ca3af; margin:4px 0 0 0;"> </p>
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div style="display:flex; justify-content:flex-end; align-items:center; gap:7px;">
            <a href="{{ route('admin.kopi.index') }}">
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