<x-layouts::auth>
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md">
            {{-- Card --}}
            <div class="relative rounded-3xl
                        bg-[#f9f4ee]
                        border border-[#e6dccf]
                        shadow-[0_25px_60px_rgba(92,64,51,0.18)]">

                <div class="px-10 pt-10 pb-8 space-y-8">

                    {{-- Logo & Header --}}
                    <div class="text-center space-y-3">
                        <img src="{{ asset('img/logo_kopi.png') }}"
                             alt="Cofftaqi"
                             class="mx-auto h-12">

                        <h1 class="text-xl font-semibold text-[#4b2e23]">
                            Selamat Datang di Cofftaqi
                        </h1>

                        <p class="text-sm text-[#7a5a44]">
                            Sistem Monitoring Persediaan Kopi
                        </p>
                    </div>

                    {{-- Status --}}
                    <x-auth-session-status
                        class="text-center text-sm text-emerald-600"
                        :status="session('status')"
                    />

                    {{-- Form --}}
                    <form method="POST"
                    action="{{ route('login.store') }}"
                    novalidate
                    class="space-y-6">
                        @csrf

                        <flux:input
                            name="email"
                            label="Email address"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Masukkan Email"
                            :error="false"
                            :invalid="false"
                        />

                        <flux:input
                            name="password"
                            label="Password"
                            type="password"
                            required
                            placeholder="Masukkan Password"
                            viewable
                            :error="false"
                            :invalid="false"
                        />

                        <flux:checkbox
                            name="remember"
                            label="Remember me"
                        />

                        <flux:button
                            type="submit"
                            class="w-full h-11 rounded-xl
       bg-gradient-to-b from-[#4F8B6A] to-[#3f7056]
       text-sm font-medium
       shadow-md hover:opacity-90 transition
       !text-white hover:!text-white">
                            Login
                        </flux:button>
                    </form>

                </div>
            </div>

            {{-- Footer --}}
            <p class="mt-6 text-center text-[10px] tracking-widest text-white">
                © {{ date('Y') }} COFFE INVENTORY MONITORING SYSTEM
            </p>

        </div>
    </div>
</x-layouts::auth>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Login Gagal',
        text: '{{ $errors->first() }}',
        confirmButtonColor: '#4F8B6A'
    });
</script>
@endif
