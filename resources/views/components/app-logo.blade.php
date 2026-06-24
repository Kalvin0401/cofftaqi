@props([
    'sidebar' => false,
])

<a
    {{ $attributes->merge([
        'class' => 'flex w-full items-center justify-center',
    ]) }}
>
    <img
        src="{{ asset('img/logo_kopi.png') }}"
        alt="Logo Kopi"
        class="{{ $sidebar ? 'h-[70px]' : 'h-[30px]' }} w-auto object-contain"
    />
</a>
