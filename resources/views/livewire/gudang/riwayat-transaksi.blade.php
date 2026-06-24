<div class="space-y-4">

    {{-- HEADER --}}
    <div>
        <div class="inline-block">
            <h2 class="text-xl font-semibold">Riwayat Transaksi</h2>
            <div style="height: 3px; background: linear-gradient(to right, #4F8B6A, #3f7056); border-radius: 999px; margin-top: 6px;"></div>
        </div>
    </div>

    {{-- BARIS UTAMA: search + filter chips + tanggal --}}
    <div class="flex flex-wrap items-center gap-2">

        {{-- Search pill --}}
        <div class="inline-flex items-center gap-1.5 bg-white dark:bg-zinc-900 rounded-full px-3 py-1.5 w-52 transition" style="border: 2px solid #4F8B6A;">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-zinc-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
            </svg>
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Cari kopi, sumber..."
                class="bg-transparent text-xs text-zinc-700 dark:text-zinc-200 placeholder-zinc-400 focus:outline-none w-full"
            >
        </div>

        {{-- Filter Semua --}}
        <button wire:click="setFilter(null)"
            class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium border transition
            {{ $filterTipe === null
                ? 'bg-zinc-800 text-white border-zinc-800'
                : 'bg-white dark:bg-zinc-900 border-zinc-200 dark:border-zinc-700 text-zinc-600 dark:text-zinc-300 hover:border-zinc-400' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            Semua
        </button>

        {{-- Filter Masuk --}}
        <button wire:click="setFilter('Masuk')"
            class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium border transition
            {{ $filterTipe === 'Masuk'
                ? 'bg-emerald-100 text-emerald-700 border-emerald-400'
                : 'bg-white dark:bg-zinc-900 border-zinc-200 dark:border-zinc-700 text-zinc-600 dark:text-zinc-300 hover:border-emerald-300' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 4v12m0 0l-4-4m4 4l4-4"/>
            </svg>
            Stok Masuk
        </button>

        {{-- Filter Keluar --}}
        <button wire:click="setFilter('Keluar')"
            class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium border transition
            {{ $filterTipe === 'Keluar'
                ? 'bg-red-100 text-red-700 border-red-400'
                : 'bg-white dark:bg-zinc-900 border-zinc-200 dark:border-zinc-700 text-zinc-600 dark:text-zinc-300 hover:border-red-300' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8v-1a2 2 0 012-2h12a2 2 0 012 2v1M12 20V8m0 0l-4 4m4-4l4 4"/>
            </svg>
            Stok Keluar
        </button>

        <span class="text-zinc-300 dark:text-zinc-600 text-lg">|</span>

        {{-- Badge Periode --}}
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open"
                class="flex items-center gap-1.5 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-full px-3 py-1.5 text-xs font-medium text-emerald-700 dark:text-emerald-400 hover:border-emerald-400 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/>
                </svg>
                {{ \Carbon\Carbon::parse($tanggal_awal)->format('d M Y') }} — {{ \Carbon\Carbon::parse($tanggal_akhir)->format('d M Y') }}
            </button>
            <div x-show="open" @click.outside="open = false"
                class="absolute left-0 top-9 z-10 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl shadow-md p-4 flex gap-3 items-end">
                <div>
                    <label class="block text-xs text-zinc-500 mb-1">Dari</label>
                    <input type="date" wire:model.live="tanggal_awal"
                        class="border border-zinc-200 dark:border-zinc-700 rounded-lg px-2 py-1.5 text-xs dark:bg-zinc-900 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs text-zinc-500 mb-1">Sampai</label>
                    <input type="date" wire:model.live="tanggal_akhir"
                        class="border border-zinc-200 dark:border-zinc-700 rounded-lg px-2 py-1.5 text-xs dark:bg-zinc-900 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>
                <button @click="open = false"
                    class="px-3 py-1.5 rounded-lg bg-emerald-600 text-white text-xs font-medium hover:bg-emerald-700 transition">
                    Terapkan
                </button>
            </div>
        </div>

    </div>

    {{-- Info range tanggal --}}
    <p class="text-xs text-zinc-400">
        Menampilkan dari
        <span class="font-semibold text-zinc-600 dark:text-zinc-300">
            {{ \Carbon\Carbon::parse($tanggal_awal)->translatedFormat('d M Y') }}
        </span>
        s/d
        <span class="font-semibold text-zinc-600 dark:text-zinc-300">
            {{ \Carbon\Carbon::parse($tanggal_akhir)->translatedFormat('d M Y') }}
        </span>
    </p>

    <!-- TABLE -->
    <div class="rounded-xl border border-zinc-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">

            <thead style="background-color: #D0E5D8;">
                <tr style="border-bottom: 2px solid #7dba9a;">
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Produk Kopi</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Tanggal</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Jenis</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Jumlah</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Harga/Kg</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Total</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Sumber/Tujuan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240;">Keterangan</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($data as $row)
                    <tr
                        x-data
                        @mouseenter="
                            $el.style.backgroundColor = '#ecfdf5';
                            $el.querySelector('td:first-child').style.boxShadow = 'inset 3px 0 0 0 #7dba9a';
                        "
                        @mouseleave="
                            $el.style.backgroundColor = '';
                            $el.querySelector('td:first-child').style.boxShadow = 'none';
                        "
                        class="even:bg-zinc-50/40 dark:even:bg-zinc-800/20">

                        {{-- PRODUK KOPI --}}
                        <td class="px-4 py-3 whitespace-nowrap font-medium text-left"
                            style="border-right: 1px solid #e5e7eb; transition: box-shadow 0.15s ease;">
                            {{ $row['kopi'] }}
                        </td>

                        {{-- TANGGAL --}}
                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ \Carbon\Carbon::parse($row['tanggal'])->format('d M Y • H:i') }}
                        </td>

                        {{-- JENIS — rata tengah, tetap berwarna --}}
                        <td class="px-4 py-3 whitespace-nowrap text-center"
                            style="border-right: 1px solid #e5e7eb;">
                            <span class="inline-flex items-center justify-center gap-1 px-2 py-1 rounded-md text-xs font-medium
                                {{ $row['tipe'] === 'Masuk'
                                    ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300'
                                    : 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300' }}">
                                @if($row['tipe'] === 'Masuk')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 4v12m0 0l-4-4m4 4l4-4"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8v-1a2 2 0 012-2h12a2 2 0 012 2v1M12 20V8m0 0l-4 4m4-4l4 4"/>
                                    </svg>
                                @endif
                                {{ $row['tipe'] }}
                            </span>
                        </td>

                        {{-- JUMLAH --}}
                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $row['tipe'] === 'Masuk' ? '+' : '-' }}{{ $row['jumlah'] }}
                            {{ $row['satuan'] }}
                        </td>

                        {{-- HARGA/KG --}}
                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            Rp {{ number_format($row['harga_perkilo'] ?? 0, 0, ',', '.') }}
                        </td>

                        {{-- TOTAL --}}
                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            Rp {{
                                number_format(
                                    ($row['harga_perkilo'] ?? 0) * ($row['jumlah'] ?? 0),
                                    0,
                                    ',',
                                    '.'
                                )
                            }}
                        </td>

                        {{-- SUMBER/TUJUAN --}}
                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $row['oleh'] }}
                        </td>

                        {{-- KETERANGAN --}}
                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            title="{{ $row['keterangan'] }}">
                            {{ \Illuminate\Support\Str::limit($row['keterangan'], 20) }}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-6 text-zinc-500">
                            Belum ada transaksi
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-4">
        {{ $data->links() }}
    </div>

</div>