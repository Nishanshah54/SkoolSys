@props([
    'variant' => 'default',
])

@php
    $baseClasses = "inline-flex items-center gap-1 rounded-full border px-2.5 py-0.5 text-xs font-semibold transition";
    $variants = [
        'default' => 'bg-zinc-100 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-100 border-transparent',
        'secondary' => 'bg-zinc-200 text-zinc-800 dark:bg-zinc-700 dark:text-white border-transparent',
        'destructive' => 'bg-red-500 text-white border-transparent dark:bg-red-600',
        'outline' => 'border border-zinc-200 text-zinc-700 dark:border-zinc-700 dark:text-zinc-200',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['default']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
