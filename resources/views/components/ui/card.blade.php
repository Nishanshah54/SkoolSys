{{-- resources/views/components/ui/card.blade.php --}}
<div {{ $attributes->merge(['class' => 'rounded-xl border bg-white p-4 shadow dark:bg-neutral-900 dark:border-neutral-700']) }}>
    {{ $slot }}
</div>
