{{-- resources/views/components/ui/button.blade.php --}}
@props([
    'variant' => 'default', // default | outline | destructive | ghost
])

@php
    $classes = match($variant) {
        'outline' => 'border border-gray-300 text-gray-700 bg-white hover:bg-gray-50',
        'destructive' => 'bg-red-600 text-white hover:bg-red-700',
        'ghost' => 'bg-transparent text-gray-700 hover:bg-gray-100',
        default => 'bg-blue-600 text-white hover:bg-blue-700',
    };
@endphp

<button {{ $attributes->merge(['class' => "px-4 py-2 rounded-md text-sm font-medium $classes"]) }}>
    {{ $slot }}
</button>
