<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-xl font-semibold">Data Kopi</h1>
            <div style="height: 3px; width: 100%; background: linear-gradient(to right, #4F8B6A, #3f7056); border-radius: 999px; margin-top: 6px;"></div>
        </div>

        <a href="{{ route('admin.kopi.create') }}">
            <button class="px-4 py-2 rounded-lg
                bg-gradient-to-b from-[#4F8B6A] to-[#3f7056]
                text-sm font-medium
                shadow-md hover:opacity-90 transition
                text-white">
                + Tambah Kopi
            </button>
        </a>
    </div>

    {{-- TABEL --}}
    <div class="rounded-xl border border-zinc-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">

            <thead style="background-color: #D0E5D8;">
                <tr style="border-bottom: 2px solid #7dba9a;">
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Kode</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Nama</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Jenis</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Asal</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Stok</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Status</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240;">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($kopis as $kopi)
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

                        {{-- KODE --}}
                        <td class="px-4 py-3 font-mono text-xs text-center"
                            style="border-right: 1px solid #e5e7eb; transition: box-shadow 0.15s ease;">
                            {{ $kopi->kode }}
                        </td>

                        {{-- NAMA --}}
                        <td class="px-4 py-3 font-medium text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $kopi->nama }}
                        </td>

                        {{-- JENIS --}}
                        <td class="px-4 py-3 text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $kopi->jenis }}
                        </td>

                        {{-- ASAL --}}
                        <td class="px-4 py-3 text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $kopi->asal }}
                        </td>

                        {{-- STOK --}}
                        <td class="px-4 py-3 text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $kopi->stok }}
                            <span class="text-xs text-zinc-500">{{ $kopi->satuan }}</span>
                        </td>

                        {{-- STATUS --}}
                        <td class="px-4 py-3 text-center"
                            style="border-right: 1px solid #e5e7eb;">
                            @if($kopi->status_stok == 'habis')
                                <span class="inline-flex items-center gap-1 rounded-full bg-gray-200 px-3 py-1 text-xs font-medium text-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                    ● Habis
                                </span>
                            @elseif($kopi->status_stok == 'kritis')
                                <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700 dark:bg-red-900/40 dark:text-red-300">
                                    ● Kritis
                                </span>
                            @elseif($kopi->status_stok == 'menipis')
                                <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-3 py-1 text-xs font-medium text-amber-700 dark:bg-amber-900/40 dark:text-amber-300">
                                    ● Menipis
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-3 py-1 text-xs font-medium text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300">
                                    ● Aman
                                </span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td class="px-4 py-3">
                            <div class="flex justify-center gap-1">

                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.kopi.edit', $kopi->id) }}">
                                    <button
                                        title="Edit"
                                        class="flex items-center justify-center w-6 h-6 rounded-md transition"
                                        style="color: #0f6e56; background: transparent;"
                                        onmouseover="this.style.background='#e1f5ee'"
                                        onmouseout="this.style.background='transparent'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                        </svg>
                                    </button>
                                </a>

                                {{-- Tombol Hapus --}}
                                <button
                                    wire:click="confirmDelete({{ $kopi->id }})"
                                    title="Hapus"
                                    class="flex items-center justify-center w-6 h-6 rounded-md transition"
                                    style="color: #A32D2D; background: transparent;"
                                    onmouseover="this.style.background='#FCEBEB'"
                                    onmouseout="this.style.background='transparent'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>

                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>

        @if($kopis->isEmpty())
            <div class="py-6 text-center text-sm text-zinc-500">
                Tidak ada data kopi
            </div>
        @endif

    </div>

</div>