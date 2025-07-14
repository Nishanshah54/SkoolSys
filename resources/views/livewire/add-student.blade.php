<div class="bg-white dark:bg-[#0a0a0a] border border-gray-200 dark:border-gray-700 rounded-lg p-6">
    <form wire:submit.prevent="store" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <input wire:model="name" type="text" required placeholder="Full Name"
                class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-100 text-sm focus:ring-0 focus:outline-none" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Education Level</label>
            <select wire:model="education" required
                class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-100 text-sm focus:ring-0 focus:outline-none">
                <option value="">{{ __('Select Education Level') }}</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="higher">Higher</option>
                <option value="bachelor">Bachelor</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mobile Number</label>
            <input wire:model="mobile_number" type="text" required placeholder="e.g. +1234567890"
                class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-100 text-sm focus:ring-0 focus:outline-none" />
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 text-sm font-medium bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 border border-gray-300 dark:border-gray-700 rounded-md hover:opacity-90 transition">
                {{ __('Add Student') }}
            </button>
        </div>
    </form>
</div>
