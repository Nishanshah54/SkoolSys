<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="p-6 space-y-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">
            {{ __('Manage Students') }}
        </h1>

        @if (session()->has('success'))
            <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 p-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <livewire:add-student />
        </div>
    </div>
</x-layouts.app>
