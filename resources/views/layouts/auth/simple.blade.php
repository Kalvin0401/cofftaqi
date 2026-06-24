<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>

<body class="min-h-screen antialiased">

    <!-- BACKGROUND IMAGE -->
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('img/login-bg.jpeg') }}" 
             class="w-full h-full object-cover blur-sm scale-110" 
             alt="Background">

        <!-- Overlay gelap biar teks/card lebih jelas -->
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <div class="relative min-h-svh flex items-center justify-center overflow-hidden px-4">

        {{-- CARD LOGIN --}}
        <div class="relative z-10 w-full max-w-sm">
            {{ $slot }}
        </div>

    </div>

    @fluxScripts
</body>
</html>
