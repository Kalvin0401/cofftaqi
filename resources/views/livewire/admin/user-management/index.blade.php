<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-xl font-semibold">Manajemen User</h1>
            <div style="height: 3px; width: 100%; background: linear-gradient(to right, #4F8B6A, #3f7056); border-radius: 999px; margin-top: 6px;"></div>
        </div>

        <a href="{{ route('admin.user.create') }}">
            <button class="px-4 py-2 rounded-lg
                bg-gradient-to-b from-[#4F8B6A] to-[#3f7056]
                text-sm font-medium
                shadow-md hover:opacity-90 transition
                text-white">
                + Tambah User
            </button>
        </a>
    </div>

    {{-- TABEL USERS --}}
    <div class="rounded-xl border border-zinc-200 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">

            <thead style="background-color: #D0E5D8;">
                <tr style="border-bottom: 2px solid #7dba9a;">
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Nama</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Email</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240; border-right: 1px solid #7dba9a;">Role</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider" style="color: #2A5240;">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($users as $user)
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

                        {{-- NAMA --}}
                        <td class="px-4 py-3 font-medium whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb; transition: box-shadow 0.15s ease;">
                            {{ $user->name }}
                        </td>

                        {{-- EMAIL --}}
                        <td class="px-4 py-3 whitespace-nowrap text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            {{ $user->email }}
                        </td>

                        {{-- ROLE --}}
                        <td class="px-4 py-3 text-left"
                            style="border-right: 1px solid #e5e7eb;">
                            @php
                                $roleLabel = match($user->role) {
                                    'admin' => 'Admin',
                                    'staf_gudang' => 'Petugas Gudang',
                                    default => ucfirst(str_replace('_', ' ', $user->role)),
                                };
                            @endphp
                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium
                                {{ $user->role === 'admin'
                                    ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300'
                                    : 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300' }}">
                                {{ $roleLabel }}
                            </span>
                        </td>

                        {{-- AKSI --}}
                        <td class="px-4 py-3">
                            <div class="flex justify-center gap-1">

                                {{-- Tombol Edit --}}
                                <a href="{{ route('admin.user.edit', $user->id) }}">
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

                                {{-- Tombol Hapus (disabled jika user sendiri) --}}
                                @if($user->id === auth()->id())
                                    <button
                                        title="Tidak bisa hapus akun sendiri"
                                        disabled
                                        class="flex items-center justify-center w-6 h-6 rounded-md cursor-not-allowed"
                                        style="color: #9ca3af; background: transparent;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                @else
                                    <button
                                        wire:click="confirmDelete({{ $user->id }})"
                                        title="Hapus"
                                        class="flex items-center justify-center w-6 h-6 rounded-md transition"
                                        style="color: #A32D2D; background: transparent;"
                                        onmouseover="this.style.background='#FCEBEB'"
                                        onmouseout="this.style.background='transparent'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                @endif

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-zinc-500">
                            Data user belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

<script>
document.addEventListener('livewire:init', () => {

    Livewire.on('confirm-delete', (data) => {
        Swal.fire({
            title: 'Yakin hapus user?',
            text: "Data user akan dihapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('deleteUser', { id: data.id })
            }
        })
    })

})
</script>