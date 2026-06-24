<div class="p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-white border border-zinc-200 flex items-center justify-center shadow-sm flex-shrink-0">
            <i class="fa-solid fa-file-pdf text-red-500 text-2xl"></i>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-zinc-900">Laporan PDF</h1>
            <p class="text-sm text-zinc-500 mt-0.5">Generate laporan stok kopi berdasarkan periode tertentu.</p>
        </div>
    </div>

    {{-- FORM CARD --}}
    <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6">
        <form wire:submit.prevent="generate">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 items-end">

                {{-- TANGGAL AWAL --}}
                <div>
                    <label class="block mb-1.5 text-xs font-semibold text-zinc-500 uppercase tracking-wide">
                        Tanggal Awal
                    </label>
                    <flux:input type="date" wire:model="tanggal_awal" />
                </div>

                {{-- TANGGAL AKHIR --}}
                <div>
                    <label class="block mb-1.5 text-xs font-semibold text-zinc-500 uppercase tracking-wide">
                        Tanggal Akhir
                    </label>
                    <flux:input type="date" wire:model="tanggal_akhir" />
                </div>

                {{-- BUTTON --}}
                <div>
                    <label class="block mb-1.5 text-xs font-semibold text-zinc-500 uppercase tracking-wide opacity-0 select-none">
                        &nbsp;
                    </label>
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="generate"
                        class="w-full h-11 rounded-xl bg-[#4F8B6A] hover:bg-[#437659] disabled:opacity-70 active:scale-95 text-white font-semibold text-sm shadow-sm transition-all duration-200 flex items-center justify-center gap-2"
                    >
                        {{-- Normal --}}
                        <span wire:loading.remove wire:target="generate" class="flex items-center gap-2">
                            <i class="fa-solid fa-file-arrow-down"></i>
                            <span>Generate &amp; Download PDF</span>
                        </span>

                        {{-- Loading --}}
                        <span wire:loading wire:target="generate" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                            <span>Membuat PDF...</span>
                        </span>
                    </button>
                </div>

            </div>
        </form>

        {{-- INFO BANNER --}}
        <div class="mt-4 flex items-start gap-3 bg-[#f0faf3] border border-[#b7e4c7] rounded-xl px-4 py-3">
            <i class="fa-solid fa-circle-info text-[#40916c] mt-0.5 text-sm flex-shrink-0"></i>
            <div>
                <p class="font-semibold text-sm text-zinc-800">Pilih periode laporan</p>
                <p class="text-xs text-zinc-500 mt-0.5 leading-relaxed">
                    Pilih tanggal awal dan tanggal akhir, lalu klik tombol generate untuk membuat laporan dalam format PDF.
                </p>
            </div>
        </div>
    </div>

    
    {{-- INFORMASI ISI LAPORAN --}}
<div class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6">

    <div class="flex items-center gap-3 mb-1">
        <div class="w-8 h-8 rounded-lg bg-[#d8f3dc] flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-clipboard-list text-[#40916c] text-sm"></i>
        </div>
        <h2 class="text-lg font-bold text-zinc-900">Informasi Isi Laporan</h2>
    </div>

    <p class="text-xs text-zinc-500 mb-4 ml-11">
        Laporan PDF yang dihasilkan akan mencakup informasi berikut:
    </p>
    {{-- 5 CARDS SEJAJAR --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-4">

    {{-- CARD 1 - Stok Masuk --}}
    <div class="border border-zinc-200 rounded-xl p-4 hover:-translate-y-1 hover:shadow-md transition-all duration-200 min-h-[180px] flex flex-col">
        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mb-3 mx-auto flex-shrink-0">
            <i class="fa-solid fa-arrow-down text-green-600 text-sm"></i>
        </div>

        <h3 class="font-bold text-green-600 text-sm text-center mb-2">
            Total Stok Masuk
        </h3>

        <p class="text-zinc-500 text-xs leading-relaxed text-center flex-grow">
            Jumlah kopi masuk pada periode terpilih.
        </p>
    </div>

    {{-- CARD 2 - Stok Keluar --}}
    <div class="border border-zinc-200 rounded-xl p-4 hover:-translate-y-1 hover:shadow-md transition-all duration-200 min-h-[180px] flex flex-col">
        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center mb-3 mx-auto flex-shrink-0">
    <i class="fa-solid fa-arrow-up text-red-500 text-sm"></i>
</div>

        <h3 class="font-bold text-blue-500 text-sm text-center mb-2">
            Total Stok Keluar
        </h3>

        <p class="text-zinc-500 text-xs leading-relaxed text-center flex-grow">
            Jumlah kopi keluar pada periode terpilih.
        </p>
    </div>

    {{-- CARD 3 - Stok Tersedia --}}
    <div class="border border-zinc-200 rounded-xl p-4 hover:-translate-y-1 hover:shadow-md transition-all duration-200 min-h-[180px] flex flex-col">
        <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center mb-3 mx-auto flex-shrink-0">
            <i class="fa-solid fa-box-open text-amber-500 text-sm"></i>
        </div>

        <h3 class="font-bold text-amber-500 text-sm text-center mb-2">
            Stok Tersedia
        </h3>

        <p class="text-zinc-500 text-xs leading-relaxed text-center flex-grow">
            Stok kopi tersisa di akhir periode.
        </p>
    </div>

    {{-- CARD 4 - Nilai Transaksi --}}
    <div class="border border-zinc-200 rounded-xl p-4 hover:-translate-y-1 hover:shadow-md transition-all duration-200 min-h-[180px] flex flex-col">
        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mb-3 mx-auto flex-shrink-0">
            <i class="fa-solid fa-money-bill-wave text-purple-500 text-sm"></i>
        </div>

        <h3 class="font-bold text-purple-500 text-sm text-center mb-2">
            Nilai Transaksi
        </h3>

        <p class="text-zinc-500 text-xs leading-relaxed text-center flex-grow">
            Total nilai masuk dan keluar (Rupiah).
        </p>
    </div>

    {{-- CARD 5 - Ringkasan Per Produk --}}
    <div class="border border-zinc-200 rounded-xl p-4 hover:-translate-y-1 hover:shadow-md transition-all duration-200 min-h-[180px] flex flex-col">
        <div class="w-10 h-10 rounded-full bg-rose-100 flex items-center justify-center mb-3 mx-auto flex-shrink-0">
            <i class="fa-solid fa-mug-hot text-rose-500 text-sm"></i>
        </div>

        <h3 class="font-bold text-rose-500 text-sm text-center mb-2">
            Ringkasan Per Produk
        </h3>

        <p class="text-zinc-500 text-xs leading-relaxed text-center flex-grow">
            Data stok tiap jenis kopi.
        </p>
    </div>

</div>
    
    {{-- TOAST NOTIFIKASI --}}
<div
    x-data="{ show: false }"
    x-on:pdf-downloaded.window="
        show = true;
        setTimeout(() => show = false, 3000)
    "
    x-show="show"
    x-transition
    class="fixed bottom-6 right-6 z-50 bg-[#4F8B6A] text-white text-sm font-medium px-4 py-3 rounded-xl shadow-lg flex items-center gap-2"
>

    <i class="fa-solid fa-circle-check"></i>
    <span>PDF berhasil dibuat dan diunduh!</span>

</div>

</div>