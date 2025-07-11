@props(['title', 'index', 'activeIndex'])

<div x-data="{ open: {{ $activeIndex === $index ? 'true' : 'false' }} }"
     x-init="$watch('open', value => $dispatch('toggle-sidebar', { index: value ? {{ $index }} : null }))"
     x-on:toggle-sidebar.window="open = $event.detail.index === {{ $index }}">

    <!-- Dropdown Button -->
    <button @click="open = !open"
            class="w-full text-left px-4 py-2 rounded flex justify-between items-center
                   text-gray-900 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700 transition">
        {{ $title }}
        <svg :class="{ 'rotate-180': open }"
             class="w-4 h-4 transition-transform"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Dropdown Content -->
    <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
        {{ $slot }}
    </div>
</div>
