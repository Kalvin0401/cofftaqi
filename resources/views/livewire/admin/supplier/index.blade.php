<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-xl font-semibold">Data Supplier</h1>
            <div style="height: 3px; width: 100%; background: linear-gradient(to right, #4F8B6A, #3f7056); border-radius: 999px; margin-top: 6px;"></div>
        </div>

        <a href="{{ route('admin.supplier.create') }}">
            <button class="px-4 py-2 rounded-lg
                bg-gradient-to-b from-[#4F8B6A] to-[#3f7056]
                text-sm font-medium
                shadow-md hover:opacity-90 transition
                text-white">
                + Tambah Supplier
            </button>
        </a>
    </div>

    {{-- SEARCH --}}
    <div class="inline-flex items-center gap-1.5 bg-white dark:bg-zinc-900 rounded-full px-3 py-1.5 w-52 transition" style="border: 2px solid #4F8B6A;">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-zinc-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
        </svg>
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Cari nama, email, telepon..."
            class="bg-transparent text-xs text-zinc-700 dark:text-zinc-200 placeholder-zinc-400 focus:outline-none w-full"
        >
    </div>

    {{-- TABEL --}}
    <div class="rounded-xl border border-zinc-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">

            <thead style="background-color: #D0E5D8;">
                <tr style="border-bottom: 2px solid #7dba9a;">
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Nama</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Alamat</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Email</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Telepon</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Keterangan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240;">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($suppliers as $supplier)
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

                        <td class="px-4 py-3 font-medium whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb; transition: box-shadow 0.15s ease;">
                            {{ $supplier->nama }}
                        </td>

                        <td class="px-4 py-3 text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $supplier->alamat }}
                        </td>

                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $supplier->email }}
                        </td>

                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $supplier->telepon }}
                        </td>

                        <td class="px-4 py-3 text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $supplier->keterangan }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex justify-center gap-1">

                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.supplier.edit', $supplier->id) }}">
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
                                    wire:click="confirmDelete({{ $supplier->id }})"
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
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-zinc-500">
                            Data supplier belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $suppliers->links() }}
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('livewire:init', () => {

    Livewire.on('confirm-delete', (data) => {
        Swal.fire({
            title: 'Yakin hapus data?',
            text: "Data supplier akan dihapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteSupplier', { id: data.id })
            }
        })
    })

    Livewire.on('deleted', () => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Supplier berhasil dihapus',
            timer: 2000,
            showConfirmButton: false
        })
    })

    Livewire.on('error-delete', (data) => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: data.message,
        })
    })

})
</script>