<div class="max-w-2xl mx-auto" style="padding-bottom: 24px;">

    {{-- PAGE HEADER --}}
    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 14px;">
        <div style="background-color: #e1f5ee; width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:15px;height:15px;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1b4332">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859M12 3v8.25m0 0l-3-3m3 3l3-3" />
            </svg>
        </div>
        <div>
            <h1 style="font-size: 1rem; font-weight: 700; margin: 0; color: #111827; line-height: 1.3;">
                {{ $stokMasukId ? 'Edit Stok Masuk' : 'Tambah Stok Masuk' }}
            </h1>
            <p style="font-size: 0.72rem; color: #9ca3af; margin: 1px 0 0 0;">
                {{ $stokMasukId ? 'Perbarui data penerimaan kopi' : 'Catat penerimaan kopi baru ke gudang' }}
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

        {{-- SECTION 1: INFORMASI KOPI --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:8px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                {{-- Ikon biji kopi jelas --}}
                <svg style="width:13px;height:13px;flex-shrink:0;" viewBox="0 0 32 32" fill="#4b5563" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="10" cy="16" rx="7" ry="10" transform="rotate(-20 10 16)"/>
                    <ellipse cx="10" cy="16" rx="2" ry="8" transform="rotate(-20 10 16)" fill="#fff" opacity="0.45"/>
                    <ellipse cx="22" cy="16" rx="7" ry="10" transform="rotate(20 22 16)"/>
                    <ellipse cx="22" cy="16" rx="2" ry="8" transform="rotate(20 22 16)" fill="#fff" opacity="0.45"/>
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Informasi Kopi</span>
            </div>
            <div style="display:table; width:100%; border-collapse:separate; border-spacing:12px 0;">
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Kopi <span style="color:#ef4444;">*</span></label>
                    <flux:select wire:model="kopi_id">
                        <option value="">-- Pilih Kopi --</option>
                        @foreach($kopis as $kopi)
                            <option value="{{ $kopi->id }}">{{ $kopi->nama }}</option>
                        @endforeach
                    </flux:select>
                </div>
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Tanggal <span style="color:#ef4444;">*</span></label>
                    <flux:input wire:model="tanggal" type="datetime-local" />
                </div>
            </div>
        </div>

        {{-- SECTION 2: JUMLAH & HARGA --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:8px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Jumlah & Harga</span>
            </div>
            <div style="display:table; width:100%; border-collapse:separate; border-spacing:12px 0; margin-bottom:10px;">
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Jumlah (kg) <span style="color:#ef4444;">*</span></label>
                    <flux:input
                        wire:ignore
                        x-data
                        x-init="
                            if ($wire.jumlah) {
                                $el.value = new Intl.NumberFormat('id-ID').format($wire.jumlah);
                            }
                            $watch('$wire.jumlah', value => {
                                if (value !== undefined && value !== null) {
                                    $el.value = new Intl.NumberFormat('id-ID').format(value);
                                }
                            });
                        "
                        x-on:input="
                            let value = $event.target.value.replace(/\D/g, '');
                            if (!value) value = 0;
                            $event.target.value = new Intl.NumberFormat('id-ID').format(value);
                            $wire.set('jumlah', value);
                        "
                        placeholder=" "
                    />
                </div>
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Harga per kg (Rp) <span style="color:#ef4444;">*</span></label>
                    <flux:input
                        x-data
                        x-init="
                            if ($wire.harga_perkilo) {
                                $el.value = new Intl.NumberFormat('id-ID').format($wire.harga_perkilo);
                            }
                        "
                        x-on:input="
                            let value = $event.target.value.replace(/\D/g, '');
                            if (!value) value = 0;
                            $event.target.value = new Intl.NumberFormat('id-ID').format(value);
                            $wire.set('harga_perkilo', value);
                        "
                        placeholder=" "
                    />
                </div>
            </div>
            {{-- TOTAL BOX --}}
            <div style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px; padding:9px 14px; display:flex; align-items:center; justify-content:space-between;">
                <div>
                    <div style="font-size:0.7rem; color:#166534; font-weight:600;">Total nilai</div>
                    <div style="font-size:0.62rem; color:#86efac;">Jumlah × harga per kg</div>
                </div>
                <div style="font-size:1.05rem; font-weight:700; color:#15803d; letter-spacing:-0.3px;">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </div>
            </div>
        </div>

        {{-- SECTION 3: SUMBER & KETERANGAN --}}
        <div style="background:#fff; border:1.5px solid #e5e7eb; border-radius:10px; padding:14px 16px; margin-bottom:14px;">
            <div style="display:flex; align-items:center; gap:5px; margin-bottom:12px; padding-bottom:9px; border-bottom:1px solid #f3f4f6;">
                <svg xmlns="http://www.w3.org/2000/svg" style="width:13px;height:13px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#4b5563">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                </svg>
                <span style="font-size:0.65rem; font-weight:700; color:#4b5563; letter-spacing:0.07em; text-transform:uppercase;">Sumber & Keterangan</span>
            </div>
            <div style="display:table; width:100%; border-collapse:separate; border-spacing:12px 0; margin-bottom:10px;">
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Sumber <span style="color:#ef4444;">*</span></label>
                    <flux:select wire:model.live="sumber_type">
                        <option value="">-- Pilih Sumber --</option>
                        <option value="supplier">Supplier</option>
                        <option value="lainnya">Lainnya</option>
                    </flux:select>
                </div>
                <div style="display:table-cell; width:50%; vertical-align:top;">
                    @if($sumber_type === 'supplier')
                        <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Nama supplier <span style="color:#ef4444;">*</span></label>
                        <flux:select wire:model="supplier_id">
                            <option value="">-- Pilih Supplier --</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                            @endforeach
                        </flux:select>
                    @else
                        <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Nama sumber</label>
                        <flux:input wire:model="sumber_nama" placeholder="Nama petani / distributor..." />
                    @endif
                </div>
            </div>
            <div>
                <label style="display:block; font-size:0.73rem; font-weight:600; color:#374151; margin-bottom:4px;">Keterangan</label>
                <flux:input wire:model="keterangan" placeholder="Kondisi, kualitas, keterangan tambahan..." />
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div style="display:flex; justify-content:flex-end; align-items:center; gap:7px;">
            <a href="{{ route('gudang.stok-masuk.index') }}">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('livewire:init', () => {

        Livewire.on('validation-error', (event) => {

            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                text: event[0].message,
                confirmButtonColor: '#1b4332'
            });

        });

    });
</script>