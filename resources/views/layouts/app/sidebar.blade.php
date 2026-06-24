<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky collapsible="mobile" class="border-e border-[#3f7056] bg-[#4F8B6A] text-white dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100">
            <flux:sidebar.header>
                {{-- Logo --}}
                <x-app-logo
                    :sidebar="true"
                    href="{{ route('dashboard') }}"
                    
                    class="block dark:hidden"
                />

                {{-- Dark mode --}}
                <a
                    href="{{ route('dashboard') }}"
                    
                    class="hidden dark:flex w-full items-center justify-center text-white"
                >
                    <div class="flex flex-col items-center justify-center leading-snug text-center">
                        <span class="text-sm font-bold tracking-wide">
                            COFFTAQI
                        </span>

                        <span class="text-[10px] font-medium tracking-[0.2em] text-white/70">
                            COFFE TANOH QINCAI
                        </span>
                    </div>
                </a>

                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>
                    <flux:sidebar.nav
                        class="
                            [&_a]:text-white/90
                            [&_button]:text-white/90
                            [&_span]:text-white/90

                            [&_[data-flux-sidebar-heading]]:text-white/70

                            [&_[aria-current=true]]:bg-white
                            [&_[aria-current=true]]:text-black
                            [&_[aria-current=true]_svg]:text-black

                            [&_[data-flux-sidebar-item]]:hover:bg-white/20
                        "
                    >
                    
                    <flux:sidebar.group heading="Dashboard">
                        <flux:sidebar.item
                            icon="layout-grid"
                            :href="route(auth()->user()->role === 'admin' ? 'admin.dashboard' : 'gudang.dashboard')"
                            :current="request()->routeIs(auth()->user()->role === 'admin' ? 'admin.dashboard' : 'gudang.dashboard')"
                            
                        >
                            Dashboard
                        </flux:sidebar.item>
                    </flux:sidebar.group>

                    @if(auth()->user()->role === 'admin')
                    <flux:sidebar.group heading="Master Data">
                    <flux:sidebar.item
                        icon="cube"
                        :href="route('admin.kopi.index')"
                        :current="request()->routeIs('admin.kopi.index')"
                       
                    >
                        Master Kopi
                    </flux:sidebar.item>


                    <flux:sidebar.item
                        icon="users"
                        :href="route('admin.supplier.index')"
                        :current="request()->routeIs('admin.supplier.*')"
                        
                    >
                        Supplier
                    </flux:sidebar.item>

                    </flux:sidebar.group>
                    @endif

                    @if(auth()->user()->role === 'staf_gudang')
                    <flux:sidebar.group heading="Transaksi">
                        <flux:sidebar.item
                            icon="arrow-down-tray"
                            :href="route('gudang.stok-masuk.index')"
                            :current="request()->routeIs('gudang.stok-masuk.*')"
                            
                        >
                            Stok Masuk
                        </flux:sidebar.item>

                        <flux:sidebar.item
                            icon="arrow-up-tray"
                            :href="route('gudang.stok-keluar.index')"
                            :current="request()->routeIs('gudang.stok-keluar.*')"
                            
                        >
                            Stok Keluar
                        </flux:sidebar.item>

                        <flux:sidebar.item 
                            icon="clock" 
                            :href="route('gudang.riwayat-transaksi')"
                            :current="request()->routeIs('gudang.riwayat-transaksi')"
                        >
                            Riwayat Transaksi
                        </flux:sidebar.item>

                    </flux:sidebar.group>
                    @endif

                    @if(in_array(auth()->user()->role, ['admin']))
                    <flux:sidebar.group heading="Laporan">
                        <flux:sidebar.item
                            icon="document-text"
                            :href="route('laporan.index')"
                            :current="request()->routeIs('laporan.*')"
                            
                        >
                            Laporan (PDF)
                        </flux:sidebar.item>
                    </flux:sidebar.group>
                    @endif

                    
                    @if(auth()->user()->role === 'admin')
                    <flux:sidebar.group heading="Sistem">
                        <flux:sidebar.item
                            icon="user"
                            :href="route('admin.user.index')"
                            :current="request()->routeIs('admin.user.*')"
                            
                        >
                            User Manajemen
                        </flux:sidebar.item>
                    </flux:sidebar.group>
                    @endif
                </flux:sidebar.nav>
            <flux:spacer />

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>


        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden ">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" >
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @fluxScripts


    </body>
</html>
