<div class="flex flex-col gap-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-zinc-900 dark:text-white">
            Dashboard Admin
        </h1>

        <p class="mt-1 text-zinc-500 dark:text-zinc-400">
            Sistem Monitoring Persediaan Kopi
        </p>
    </div>

{{-- HEADER KPI --}}

<style>
.kpi-card {
    transition: transform 0.18s cubic-bezier(.34,1.56,.64,1), box-shadow 0.18s ease;
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

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">

    {{-- TOTAL PRODUK KOPI --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-3 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-amber-400/30 to-orange-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
             <p class="text-sm font-semibold text-zinc-700">Total Produk Kopi</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-amber-600 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
                    <path d="M14 22 C6 16 4 4 10 -2 C18 2 20 14 14 22Z"
                          fill="rgba(255,255,255,0.95)"/>
                    <path d="M12 -1 C13 6 14 14 14 21"
                          fill="none" stroke="#b45309" stroke-width="1.6" stroke-linecap="round"/>
                    <path d="M12 7 C9 10 7 11 7 12"
                          fill="none" stroke="#b45309" stroke-width="1.1" stroke-linecap="round" opacity="0.8"/>
                    <path d="M13 13 C10 16 9 17 9 18"
                          fill="none" stroke="#b45309" stroke-width="1.1" stroke-linecap="round" opacity="0.8"/>
                    <ellipse cx="7" cy="14" rx="5" ry="8"
                             fill="rgba(255,255,255,0.95)" transform="rotate(15 7 14)"/>
                    <path d="M7 6 C9 10 9 18 7 22"
                          fill="none" stroke="#b45309" stroke-width="1.5" stroke-linecap="round"
                          transform="rotate(15 7 14)"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 pl-3 text-4xl font-bold tracking-tight text-amber-700">
            {{ $totalProduk }}
        </p>
        <p class="text-xs leading-none text-zinc-400">
        Jenis Kopi
        </p>
    </div>

    {{-- STOK MASUK --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-3 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-emerald-400/30 to-green-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
             <p class="text-sm font-semibold text-zinc-700">Stok Masuk</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 4v12M6 11l6 6 6-6"/>
                    <line x1="4" y1="20" x2="20" y2="20"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 flex items-baseline gap-1 pl-3">
            <span class="text-4xl font-bold tracking-tight text-emerald-600">
                {{ number_format($totalStokMasuk, 0, ',', '.') }}
            </span>
            <span class="text-2xl font-bold text-emerald-600">Kg</span>
        </p>
        <p class="text-xs leading-none text-zinc-400">
        Total Stok Masuk
        </p>
    </div>

    {{-- STOK KELUAR --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-3 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-rose-400/30 to-red-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
             <p class="text-sm font-semibold text-zinc-700">Stok Keluar</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-rose-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 20V8M6 13l6-6 6 6"/>
                    <line x1="4" y1="4" x2="20" y2="4"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 flex items-baseline gap-1 pl-3">
            <span class="text-4xl font-bold tracking-tight text-rose-600">
                {{ number_format($totalStokKeluar, 0, ',', '.') }}
            </span>
            <span class="text-2xl font-bold text-rose-600">Kg</span>
        </p>
        <p class="text-xs leading-none text-zinc-400">
        Total Stok Keluar
        </p>
    </div>

    {{-- STOK TERSEDIA --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-3 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-gradient-to-br from-indigo-400/30 to-purple-600/30 blur-2xl"></div>
        <div class="flex items-start justify-between px-3">
             <p class="text-sm font-semibold text-zinc-700">Stok Tersedia</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 8l10-5 10 5-10 5-10-5z" fill="currentColor" stroke="none"/>
                    <path d="M2 12l10 5 10-5"/>
                    <path d="M2 16l10 5 10-5"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 flex items-baseline gap-1 pl-3">
            <span class="text-4xl font-bold tracking-tight text-indigo-600">
                {{ number_format($stokTersedia, 0, ',', '.') }}
            </span>
            <span class="text-2xl font-bold text-indigo-600">Kg</span>
        </p>
        <p class="text-xs leading-none text-zinc-400">
        Total Stok Tersedia
        </p>
    </div>

    {{-- SUPPLIER --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-3 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full blur-2xl"
             style="background: radial-gradient(circle, rgba(45,212,191,0.3), rgba(8,145,178,0.3))"></div>
        <div class="flex items-start justify-between px-3">
             <p class="text-sm font-semibold text-zinc-700">Supplier</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-teal-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
            </div>
        </div>
        <p class="mt-3 pl-3 text-4xl font-bold tracking-tight text-teal-600">
            {{ $totalSupplier }}
        </p>
        <p class="text-xs leading-none text-zinc-400">
        Jumlah Supplier
        </p>
    </div>

    {{-- PRODUK TERLARIS --}}
    <div class="kpi-card relative overflow-hidden rounded-2xl border-2 border-zinc-300 bg-white p-3 shadow-md backdrop-blur dark:border-zinc-600 dark:bg-zinc-900">
        <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full blur-2xl"
             style="background: radial-gradient(circle, rgba(250,204,21,0.3), rgba(245,158,11,0.3))"></div>
        <div class="flex items-start justify-between px-3">
             <p class="text-sm font-semibold text-zinc-700">Produk Terlaris</p>
            <div class="kpi-icon flex h-10 w-10 items-center justify-center rounded-xl bg-yellow-500 text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 5h-2V3H7v2H5C3.9 5 3 5.9 3 7v1c0 2.55 1.92 4.63 4.39 4.94.63 1.5 1.98 2.63 3.61 2.96V18H9v2h6v-2h-2v-2.1a5.009 5.009 0 0 0 3.61-2.96C19.08 12.63 21 10.55 21 8V7c0-1.1-.9-2-2-2zM5 8V7h2v3.82C5.84 10.4 5 9.3 5 8zm14 0c0 1.3-.84 2.4-2 2.82V7h2v1z"/>
                </svg>
            </div>
        </div>
        <div class="mt-3 pl-3">
            <p class="text-2xl font-bold tracking-tight text-yellow-600 dark:text-yellow-400">
                {{ $produkTerlaris?->kopi?->nama ?? '-' }}
            </p>
            <p class="mt-1 text-xs text-zinc-400">
                Keluar {{ number_format($produkTerlaris?->total_keluar ?? 0, 0, ',', '.') }} Kg
            </p>
        </div>
    </div>

</div>
    {{-- GRID --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- LEFT --}}
        <div class="space-y-6 xl:col-span-2">

            {{-- CHART --}}
            <div
                class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

                <div class="mb-6 flex items-center justify-between">

                    <div>
                        <h2 class="text-xl font-bold text-zinc-900 dark:text-white">
                            Grafik Stok Masuk & Keluar
                        </h2>

                        <p class="text-sm text-zinc-500">
                            Per Bulan Tahun {{ $tahun }}
                        </p>
                    </div>

                  <select
    onchange="window.location.href='?tahun=' + this.value"
    class="rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm dark:border-zinc-700 dark:bg-zinc-800">

    @foreach($daftarTahun as $item)

        <option
            value="{{ $item }}"
            {{ $tahun == $item ? 'selected' : '' }}>

            {{ $item }}

        </option>

    @endforeach

</select>

                </div>

                <div class="h-[350px]">

    <div wire:ignore>
    <canvas id="stokChart"></canvas>
</div>
</div>
                <div
                    class="mt-5 rounded-xl border border-zinc-200 bg-zinc-50 px-4 py-3 text-sm text-zinc-600 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">
                    Grafik menampilkan perbandingan stok masuk dan stok keluar setiap bulan pada tahun yang dipilih.
                </div>

            </div>

{{-- DISTRIBUSI + ANALISIS --}}
<div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-2">

    {{-- DISTRIBUSI STOK --}}
    <div class="rounded-2xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

        {{-- HEADER --}}
        <div class="mb-3">
            <h2 class="text-xl font-bold text-zinc-900 dark:text-white">
                Distribusi Stok
            </h2>
            <p class="mt-0.5 text-xs text-zinc-500">
                Stok kopi saat ini
            </p>
        </div>

        {{-- CONTENT --}}
        <div class="flex flex-col items-center gap-4 xl:flex-row xl:items-center">

            {{-- CHART --}}
            <div class="flex justify-center">
                <div class="h-[180px] w-[180px]">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>

            {{-- DETAIL --}}
            <div class="w-full flex-1">
                <div class="space-y-3">

                    @foreach ($distribusiStok as $item)
                        @php
                            $persen = $stokTersedia > 0
                                ? round(($item['stok'] / $stokTersedia) * 100, 1)
                                : 0;
                        @endphp

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div
                                    class="h-3 w-3 rounded-full"
                                    style="background-color: {{ $item['warna'] }}">
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-zinc-800 dark:text-white">
                                        {{ $item['nama'] }}
                                    </p>
                                    <p class="text-xs text-zinc-500">
                                        {{ $persen }}%
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-base font-bold text-zinc-900 dark:text-white">
                                    {{ number_format($item['stok'], 0, ',', '.') }}
                                </p>
                                <p class="text-xs text-zinc-500">Kg</p>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- TOTAL --}}
                <div class="mt-3 rounded-xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-800">
                    <p class="text-xs text-zinc-500">Total Stok Tersedia</p>
                    <h3 class="mt-1 text-2xl font-bold tracking-tight text-zinc-900 dark:text-white">
                        {{ number_format($stokTersedia, 0, ',', '.') }}
                        <span class="text-sm font-semibold">Kg</span>
                    </h3>
                </div>

            </div>
        </div>

    </div>

    {{-- ANALISIS --}}
    <div class="rounded-2xl border border-zinc-200 bg-white p-4 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

        {{-- HEADER --}}
        <div class="mb-3">
            <h2 class="text-xl font-bold text-zinc-900 dark:text-white">
                Analisis Bulanan
            </h2>
            <p class="mt-0.5 text-xs text-zinc-500">
                Dibandingkan bulan sebelumnya
            </p>
        </div>

        {{-- CONTENT --}}
        <div class="space-y-3">

            {{-- STOK MASUK --}}
            <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-800">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl
                            @if(is_null($analisisMasuk['naik']))
                                bg-gray-100 text-gray-700
                            @elseif($analisisMasuk['naik'])
                                bg-emerald-100 text-emerald-700
                            @else
                                bg-red-100 text-red-700
                            @endif">
                        <span class="text-lg">@if(is_null($analisisMasuk['naik']))
                            –
                        @else
                            {{ $analisisMasuk['naik'] ? '↑' : '↓' }}
                        @endif</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-zinc-900 dark:text-white">Stok Masuk</h3>
                            <span class="rounded-full px-2 py-0.5 text-xs font-bold
                                    @if(is_null($analisisMasuk['naik']))
                                        bg-gray-100 text-gray-700
                                    @elseif($analisisMasuk['naik'])
                                        bg-emerald-100 text-emerald-700
                                    @else
                                        bg-red-100 text-red-700
                                    @endif">
                                @if(is_null($analisisMasuk['persen']))
                                 –
                                @else
                                 {{ abs($analisisMasuk['persen']) }}%
                                @endif
                            </span>
                        </div>
                        <p class="mt-0.5 text-xs text-zinc-500">Total: {{ number_format($analisisMasuk['total'], 0, ',', '.') }} Kg</p>
                        <p class="mt-0.5 text-xs text-zinc-500">{{ $pesanMasuk }}</p>
                    </div>
                </div>
            </div>

            {{-- STOK KELUAR --}}
            <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-700 dark:bg-zinc-800">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl
                            @if(is_null($analisisKeluar['naik']))
                                bg-gray-100 text-gray-700
                            @elseif($analisisKeluar['naik'])
                                bg-red-100 text-red-700
                            @else
                                bg-emerald-100 text-emerald-700
                            @endif">
                        <span class="text-lg">@if(is_null($analisisKeluar['naik']))
                            –
                        @else
                            {{ $analisisKeluar['naik'] ? '↑' : '↓' }}
                        @endif</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-zinc-900 dark:text-white">Stok Keluar</h3>
                            <span class="rounded-full px-2 py-0.5 text-xs font-bold
                                    @if(is_null($analisisKeluar['naik']))
                                        bg-gray-100 text-gray-700
                                    @elseif($analisisKeluar['naik'])
                                        bg-red-100 text-red-700
                                    @else
                                        bg-emerald-100 text-emerald-700
                                    @endif">
                                @if(is_null($analisisKeluar['persen']))
                                    –
                                @else
                                    {{ abs($analisisKeluar['persen']) }}%
                                @endif
                            </span>
                        </div>
                        <p class="mt-0.5 text-xs text-zinc-500">Total: {{ number_format($analisisKeluar['total'], 0, ',', '.') }} Kg</p>
                        <p class="mt-0.5 text-xs text-zinc-500">{{ $pesanKeluar }}</p>
                    </div>
                </div>
            </div>

            {{-- STOK TERSEDIA --}}
            <div class="rounded-xl border border-blue-200 bg-blue-50 p-3 dark:border-blue-800 dark:bg-blue-950/30">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-700">
                        <span class="text-lg">ⓘ</span>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-zinc-900 dark:text-white">Total Stok Tersedia</h3>
                        <p class="mt-0.5 text-xl font-bold text-blue-700">
                            {{ number_format($stokTersedia, 0, ',', '.') }} Kg
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
        {{-- ALERT STOK --}}
<div
    class="rounded-2xl border border-neutral-200 bg-white/70 p-6 backdrop-blur dark:border-neutral-700 dark:bg-neutral-900/70">

    <div class="mb-5 flex items-center justify-between">

        <div>

            <h2 class="text-lg font-semibold tracking-tight text-red-600">
                Alert Stok
            </h2>

            <p class="text-sm text-neutral-500">
                Monitoring stok kopi
            </p>

        </div>

        <span
            class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-medium dark:bg-neutral-800">

            {{ count($alertStok) }} Produk

        </span>

    </div>

    <ul class="space-y-3">

        @forelse($alertStok as $item)

           <li

@if ($item['warna'] == 'gray')
    style="background-color: #e5e7eb;"

@elseif($item['warna'] == 'red')
    style="background-color: #fee2e2;"

@elseif($item['warna'] == 'amber')
    style="background-color: #fef9c3;"

@else
    style="background-color: #dcfce7;"
@endif

class="flex items-center justify-between rounded-xl px-4 py-3"
>

                <div>

                    <p class="font-medium text-zinc-800 dark:text-white">
                        {{ $item['nama'] }}
                    </p>

                    <p class="text-xs text-neutral-500">

                        Sisa
                        {{ number_format($item['stok'], 0, ',', '.') }}
                        Kg

                    </p>

                </div>

                {{-- STATUS --}}
@if ($item['status'] == 'Habis')

    <span
        class="rounded-full bg-gray-600/10 px-3 py-1 text-xs font-bold text-gray-600">

        HABIS

    </span>

@elseif($item['status'] == 'Kritis')

    <span
        class="rounded-full bg-red-600/10 px-3 py-1 text-xs font-bold text-red-600">

        KRITIS

    </span>

@elseif($item['status'] == 'Menipis')

    <span
        class="rounded-full bg-amber-500/10 px-3 py-1 text-xs font-bold text-amber-600">

        MENIPIS

    </span>

@else

    <span
        class="rounded-full bg-emerald-600/10 px-3 py-1 text-xs font-bold text-emerald-600">

        AMAN

    </span>

@endif

            </li>

        @empty

            <div
    class="rounded-xl bg-emerald-50 px-4 py-3 text-center">

    <span class="font-medium text-emerald-700">
        ✓ Semua stok dalam kondisi aman
    </span>

        </div>

        @endforelse

    </ul>

</div>
{{-- RIWAYAT TRANSAKSI --}}
<div
    class="mt-6 rounded-2xl border border-zinc-200 bg-white/70 p-6 backdrop-blur dark:border-zinc-700 dark:bg-zinc-900/70">

    <div class="mb-6 flex items-center justify-between">

        <h2 class="text-lg font-semibold tracking-tight">
            Riwayat Transaksi
        </h2>

        <span
            class="rounded-full bg-zinc-100 px-3 py-1 text-xs font-medium dark:bg-zinc-800">
            Terakhir
        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead
            class="border-b border-zinc-200 text-left text-xs uppercase tracking-wide text-zinc-500 dark:border-zinc-700">

            <tr>
                <th class="py-3">Tanggal</th>
                <th>Produk</th>
                <th>Jenis</th>
                <th class="text-right">Jumlah</th>
            </tr>

            </thead>

            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">

                @foreach($riwayatTransaksi as $transaksi)

                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50">

                        <td class="py-3">
                            {{ $transaksi['tanggal'] }}
                        </td>

                        <td>
                            {{ $transaksi['produk'] }}
                        </td>

                        <td>
                            <span
                                class="rounded-full px-3 py-1 text-xs font-semibold

                                {{ $transaksi['jenis'] == 'Masuk'
                                    ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300'
                                    : 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300'
                                }}
                            ">

                                {{ $transaksi['jenis'] }}

                            </span>

                        </td>

                        <td class="text-right font-medium">
                            {{ number_format($transaksi['jumlah'], 0, ',', '.') }} Kg
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let stokChart = null;

function loadChart(labels, masuk, keluar) {
    const canvas = document.getElementById('stokChart');
    if (!canvas) return;

    if (stokChart instanceof Chart) {
        stokChart.destroy();
        stokChart = null;
    }

    stokChart = new Chart(canvas, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Stok Masuk',
                    data: masuk,
                    backgroundColor: 'rgba(16,185,129,0.8)',
                    borderRadius: 10
                },
                {
                    label: 'Stok Keluar',
                    data: keluar,
                    backgroundColor: 'rgba(239,68,68,0.8)',
                    borderRadius: 10
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'top' } },
            scales: { y: { beginAtZero: true } }
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    loadChart(
        @json($chartLabels),
        @json($chartStokMasuk),
        @json($chartStokKeluar)
    );
});

// FIX: e.detail langsung object, bukan array
window.addEventListener('updateChart', function (e) {
    loadChart(e.detail.labels, e.detail.masuk, e.detail.keluar);
});


    // PIE CHART
    const pieCtx = document.getElementById('pieChart');
    if (pieCtx) {
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            // Mengambil label dari properti $pieLabels
            labels: @js($pieLabels), 
            datasets: [{
                // Mengambil data stok dari properti $pieData
                data: @js($pieData),
                backgroundColor: [
                    '#059669',
                    '#fbbf24',
                    '#3b82f6',
                    '#ef4444',
                    '#8b5cf6',
                    '#14b8a6'
                ]
            }]
        },
        options: {
            responsive: true,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}
</script>