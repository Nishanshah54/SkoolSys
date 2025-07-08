@props([
    'triggerText' => 'Open Dialog',
    'confirmText' => 'Continue',
    'cancelText' => 'Cancel',
    'title' => 'Are you absolutely sure?',
    'description' => 'This action cannot be undone.',
])

<div x-data="{ open: false }">
    <!-- Trigger Button -->
    <button @click="open = true" class="inline-flex items-center px-4 py-2 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
        {{ $triggerText }}
    </button>

    <!-- Dialog -->
    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
    >
        <div
            @click.away="open = false"
            {{ $attributes->merge(['class' => 'w-full max-w-md rounded-lg bg-white dark:bg-neutral-900 shadow-xl p-6']) }}
        >
            <!-- Header -->
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $title }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                {{ $description }}
            </p>

            <!-- Slot for Additional Content -->
            {{ $slot }}

            <!-- Footer -->
            <div class="mt-6 flex justify-end gap-2">
                <button
                    @click="open = false"
                    class="px-4 py-2 text-sm border rounded-md hover:bg-gray-100 dark:hover:bg-neutral-700"
                >
                    {{ $cancelText }}
                </button>
                <button
                    @click="open = false"
                    class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-md hover:bg-red-700"
                >
                    {{ $confirmText }}
                </button>
            </div>
        </div>
    </div>
</div>
