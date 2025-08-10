<div class="bg-white dark:bg-[#0a0a0a] border border-gray-200 dark:border-gray-700 rounded-lg p-6">
    <form wire:submit.prevent="{{ $this->isEdit ? 'update' : 'store' }}" class="space-y-4">
        {{-- Success Flash Message --}}
        @if (session()->has('success'))
            <div class="p-2 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-100 text-sm rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Name Field --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input wire:model.defer="name" type="text" required placeholder="Full Name"
                class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-100 text-sm focus:ring-0 focus:outline-none" />
            @error('name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Education Level Field --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Education Level</label>
            <select wire:model.defer="education" required
                class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-100 text-sm focus:ring-0 focus:outline-none">
                <option value="">{{ __('Select Education Level') }}</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="higher">Higher</option>
                <option value="bachelor">Bachelor</option>
            </select>
            @error('education') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Mobile Number Field --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mobile Number</label>
            <input wire:model.defer="mobile_number" type="number" required placeholder="e.g. +1234567890"
                class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-100 text-sm focus:ring-0 focus:outline-none" />
            @error('mobile_number') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        {{-- Grade Field --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Grade</label>
            <select wire:model.defer="grade_id" required
                class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-100 text-sm focus:ring-0 focus:outline-none">
                <option value="">Select Grade</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
            @error('grade_id') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Section Field --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Section</label>
            <select wire:model.defer="section_id" required
                class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-100 text-sm focus:ring-0 focus:outline-none">
                <option value="">Select Section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }} ({{ $section->grade->name }})</option>
                @endforeach
            </select>
            @error('section_id') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Submit Button --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 text-sm font-medium bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 border border-gray-300 dark:border-gray-700 rounded-md hover:opacity-90 transition">
                {{ $this->isEdit ? 'Update Student' : 'Add Student' }}
            </button>
        </div>
    </form>
</div>
