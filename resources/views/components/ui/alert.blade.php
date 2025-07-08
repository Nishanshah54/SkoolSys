@props([
    'variant' => 'default', // default or destructive
    'icon' => null,
    'title' => null,
    'description' => null,
])

@php
    $base = 'w-full rounded-lg border p-4 text-sm flex items-start gap-3';
    $styles = match($variant) {
    'destructive' => 'bg-red-50 text-red-800 border-red-300 dark:bg-red-950 dark:text-red-100 dark:border-red-800',
    'info' => 'bg-blue-50 text-blue-800 border-blue-300 dark:bg-blue-950 dark:text-blue-100 dark:border-blue-800',
    'warning' => 'bg-yellow-50 text-yellow-800 border-yellow-300 dark:bg-yellow-950 dark:text-yellow-100 dark:border-yellow-800',
    'success' => 'bg-emerald-50 text-emerald-800 border-emerald-300 dark:bg-emerald-950 dark:text-emerald-100 dark:border-emerald-800',
         default => 'bg-green-50 text-green-800 border-green-300 dark:bg-green-950 dark:text-green-100 dark:border-green-800',
    };
@endphp

<div {{ $attributes->merge(['class' => "$base $styles"]) }}>
    @if ($icon)
        <div class="shrink-0 mt-1">
            {!! $icon !!}
        </div>
    @endif

    <div class="flex flex-col gap-1">
        @if ($title)
            <h3 class="font-semibold text-sm leading-tight">{{ $title }}</h3>
        @endif

        @if ($description)
            <div class="text-xs text-muted-foreground dark:text-neutral-300">{!! $description !!}</div>
        @endif
    </div>
</div>
