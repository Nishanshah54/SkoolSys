@props([
    'type' => 'text',
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'disabled' => false,
    'helpText' => null,
    'icon' => null,
])

<div class="space-y-2 mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ $label }}@if($required) <span class="text-red-500">*</span> @endif
        </label>
    @endif

    <div class="relative">
        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                @svg($icon, 'h-5 w-5 text-gray-400 dark:text-gray-500')
            </div>
        @endif

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge([
                'class' =>
                    'block w-full rounded-lg border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 ' .
                    ($errors->has($name) ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : '') .
                    ($icon ? ' pl-10' : '')
            ]) }}
        />
    </div>

    @if($helpText && !$errors->has($name))
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $helpText }}</p>
    @endif

    @error($name)
        <p class="mt-1 text-xs text-red-600 dark:text-red-500 flex items-center">
            @svg('heroicon-s-exclamation-circle', 'h-4 w-4 mr-1')
            {{ $message }}
        </p>
    @enderror
</div>
