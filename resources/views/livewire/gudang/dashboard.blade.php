<div class="flex h-full w-full flex-1 flex-col gap-8">

    {{-- HEADER --}}
<div>
    <h1 class="text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">
        Dashboard Petugas Gudang
    </h1>

    <p class="mt-1 text-zinc-500 dark:text-zinc-400">
        Sistem Monitoring Persediaan Kopi
    </p>
</div>
    {{-- HEADER KPI --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
    <style>
.kpi-card {
    transition: transform 0.18s cubic-bezier(.34,1.56,.64,1),
                box-shadow 0.18s ease;
    cursor: pointer;
    user-select: none;
}
.kpi-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px -8px rgba(0,0,0,0.13);
}
.kpi-card:active {
    transform: scale(0.95) translateY(2px);
    box-shadow: 0 2px 8px -2px rgba(0,0,0,0.10);
}
.kpi-icon {
    transition: transform 0.22s cubic-bezier(.34,1.56,.64,1);
}
.kpi-card:hover .kpi-icon {
    transform: scale(1.18) rotate(-6deg);
}
.kpi-card:active .kpi-icon {
    transform: scale(0.9) rotate(0deg);
}
</style>

    {{-- TOTAL PRODUK --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-4 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-amber-400/30 to-orange-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
            <p class="text-sm text-zinc-500">Total Produk Kopi</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-amber-600 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                    <ellipse cx="8" cy="14" rx="5.5" ry="8" fill="white" opacity="0.9" transform="rotate(-20 8 14)"/>
                    <path d="M8 6 C10 10 10 18 8 22" fill="none" stroke="#b45309" stroke-width="1.8" stroke-linecap="round" transform="rotate(-20 8 14)"/>
                    <path d="M15 20 C11 14 13 6 19 2 C23 7 21 16 15 20Z" fill="white" opacity="0.75"/>
                    <line x1="17" y1="3" x2="15" y2="19" stroke="#b45309" stroke-width="1.4" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 pl-4 text-4xl font-bold tracking-tight text-amber-700">
            {{ $totalProduk }}
        </p>
    </div>

    {{-- STOK MASUK HARI INI --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-4 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-emerald-400/30 to-green-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
            <p class="text-sm text-zinc-500">Stok Masuk Hari Ini</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 4v12M6 11l6 6 6-6"/>
                    <line x1="4" y1="20" x2="20" y2="20"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 flex items-baseline gap-1 pl-4">
            <span class="text-4xl font-bold tracking-tight text-emerald-600">
                {{ number_format($stokMasukHariIni, 0, ',', '.') }}
            </span>
            <span class="text-2xl font-bold text-emerald-600">
                Kg
            </span>
        </p>
    </div>

    {{-- STOK KELUAR HARI INI --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-4 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-rose-400/30 to-red-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
            <p class="text-sm text-zinc-500">Stok Keluar Hari Ini</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-rose-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 20V8M6 13l6-6 6 6"/>
                    <line x1="4" y1="4" x2="20" y2="4"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 flex items-baseline gap-1 pl-4">
            <span class="text-4xl font-bold tracking-tight text-rose-600">
                {{ number_format($stokKeluarHariIni, 0, ',', '.') }}
            </span>
            <span class="text-2xl font-bold text-rose-600">
                Kg
            </span>
        </p>
    </div>

    {{-- STOK TERSEDIA --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-4 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-indigo-400/30 to-purple-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
            <p class="text-sm text-zinc-500">Stok Tersedia</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 8l10-5 10 5-10 5-10-5z" fill="currentColor" stroke="none"/>
                    <path d="M2 12l10 5 10-5"/>
                    <path d="M2 16l10 5 10-5"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 flex items-baseline gap-1 pl-4">
            <span class="text-4xl font-bold tracking-tight text-indigo-600">
                {{ number_format($stokTersedia, 0, ',', '.') }}
            </span>
            <span class="text-2xl font-bold text-indigo-600">
                Kg
            </span>
        </p>
    </div>

    {{-- PERINGATAN STOK --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-4 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-amber-400/30 to-orange-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
            <p class="text-sm text-zinc-500">Peringatan Stok</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L1 21h22L12 2zm0 6a1 1 0 011 1v5a1 1 0 11-2 0V9a1 1 0 011-1zm0 11a1.25 1.25 0 100-2.5A1.25 1.25 0 0012 19z"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 pl-4 text-4xl font-bold tracking-tight text-amber-600">
            {{ $stokKritis }}
        </p>
    </div>

</div>
    {{-- KONTEN UTAMA --}}
    <div class="grid flex-1 gap-8 md:grid-cols-3">

        {{-- TRANSAKSI TERAKHIR --}}
        <div class="md:col-span-2 rounded-2xl border border-neutral-200 bg-white/70 p-6 backdrop-blur transition hover:shadow-lg dark:border-neutral-700 dark:bg-neutral-900/70">
            <div class="mb-5 flex items-center justify-between">
                <h2 class="text-lg font-semibold tracking-tight">
                    Riwayat Transaksi 
                </h2>
                <span class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium dark:bg-neutral-800">
                    Terakhir
                </span>
            </div>

             <div class="overflow-x-auto">
                <table class="w-full table-fixed text-sm">
    <thead class="border-b border-zinc-200 text-sm font-medium text-zinc-500 dark:border-zinc-700">
        <tr>
            <th class="w-32 py-3 px-4 text-center">Tanggal</th>
            <th class="w-56 py-3 px-4 text-center">Produk</th>
            <th class="w-28 py-3 px-4 text-center">Jenis</th>
            <th class="w-32 py-3 px-4 text-center">Jumlah</th>
            <th class="w-40 py-3 px-4 text-center">Harga/Kg</th>
        </tr>
    </thead>

    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
        @forelse($transaksiTerakhir as $trx)
            <tr class="group transition hover:bg-neutral-50 dark:hover:bg-neutral-800/50">

                <td class="py-4 px-4 font-medium truncate text-zinc-700">
                    {{ $trx['tanggal'] }}
                </td>

                <td class="py-4 px-4 font-medium truncate text-zinc-700">
                    {{ $trx['produk'] }}
                </td>

                <td class="py-4 px-4 text-center">
                    <span class="inline-flex min-w-[90px] justify-center rounded-full px-3 py-1 text-xs font-semibold
                        {{ $trx['jenis'] === 'Masuk'
                            ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300'
                            : 'bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300' }}">
                        {{ $trx['jenis'] }}
                    </span>
                </td>

                <td class="py-4 px-4 font-medium truncate text-zinc-700">
                    {{ number_format($trx['jumlah'], 0, ',', '.') }} Kg
                </td>

                <td class="py-4 px-4 font-medium truncate text-zinc-700">
                    Rp {{ number_format($trx['harga_perkilo'], 0, ',', '.') }}
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="5" class="py-8 text-center text-neutral-500">
                    Belum ada transaksi hari ini
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
                <div class="mt-4 flex justify-end">

            <a
                href="{{ route('gudang.riwayat-transaksi') }}"
                class="text-sm font-medium text-emerald-600 hover:text-emerald-700">

                Lihat Semua Riwayat →

            </a>

    </div>
            </div>
        </div>

        {{-- PRODUK KRITIS --}}
        <div class="rounded-2xl border border-neutral-200 bg-white/70 p-6 backdrop-blur dark:border-neutral-700 dark:bg-neutral-900/70">
            <h2 class="mb-5 text-lg font-semibold tracking-tight text-red-600">
                Stok Hampir Habis
            </h2>

            <ul class="space-y-3">
                @forelse($produkKritis as $kopi)
                   <li class="flex items-center justify-between rounded-xl px-4 py-3"

                    @if($kopi->status_stok === 'kritis')
                        style="background-color: #fee2e2;"

                    @elseif($kopi->status_stok === 'menipis')
                        style="background-color: #fef3c7;"

                    @elseif($kopi->status_stok === 'habis')
                        style="background-color: #e5e7eb;"

                    @endif
                    >
                        <div>
                            <p class="font-medium">{{ $kopi->nama }}</p>
                            <p class="text-xs text-neutral-500">
                                Sisa {{ $kopi->stok }} {{ $kopi->satuan }}
                            </p>
                        </div>

                        @if($kopi->status_stok === 'kritis')

                    <span class="rounded-full bg-red-600/10 px-3 py-1 text-xs font-bold text-red-600">
                        KRITIS
                    </span>

                @elseif($kopi->status_stok === 'menipis')

                    <span class="rounded-full bg-amber-500/10 px-3 py-1 text-xs font-bold text-amber-600">
                        MENIPIS
                    </span>

                @elseif($kopi->status_stok === 'habis')

                    <span class="rounded-full bg-gray-600/10 px-3 py-1 text-xs font-bold text-gray-600">
                        HABIS
                    </span>

                @endif
                    </li>
                @empty
                    <p class="text-sm text-neutral-500">
                        Semua stok aman
                    </p>
                @endforelse
            </ul>
        </div>

    </div>
</div>
