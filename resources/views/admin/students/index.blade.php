<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">
            {{ __('Manage Students') }}
        </h1>

        <!-- Theme-aware content box -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
            <p class="text-gray-700 dark:text-gray-300">
                {{ __('This is where you will manage student records.') }}
            </p>
        </div>
    </div>
</x-layouts.app>
