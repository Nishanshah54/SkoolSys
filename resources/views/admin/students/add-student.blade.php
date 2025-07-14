<x-layouts.app :title="__('Dashboard | View Details')">
           @if (session()->has('success'))
            <div
                class="p-4 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-300 dark:border-green-700">
                {{ session('success') }}
            </div>
        @endif
        <!-- Add Student Form -->
        <div class=" flex flex-col bg-white dark:bg-[#0f0e0e] shadow rounded-lg p-6">
            <div class="flex flex-col gap-6 p-2 ">
                <h2 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-100">
                    {{ __('Add Students') }}
                </h2>
            </div>
            <div class="flex flex-col gap-6 p-2 ">
                <livewire:add-student />
            </div>
</x-layouts.app>
