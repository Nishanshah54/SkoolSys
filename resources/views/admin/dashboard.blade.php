<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <!-- Header -->
        <div class="flex items-center gap-2 text-3xl font-semibold text-gray-800 dark:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 4a1 1 0 011-1h2a1 1 0 011 1v16H3V4zm13 16V4a1 1 0 011-1h2a1 1 0 011 1v16h-4zM9 12h6" />
            </svg>
            SkoolSys Admin Dashboard
        </div>

        <!-- Stats Cards -->
        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-4">
            <!-- Students -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A4.992 4.992 0 005 20h14a4.992 4.992 0 00-.121-2.196M15 11a3 3 0 00-6 0v1a3 3 0 006 0v-1z" />
                    </svg>
                    Students
                </div>
                <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">650</div>
            </div>

            <!-- Teachers -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7M8 7h.01M16 7h.01" />
                    </svg>
                    Teachers
                </div>
                <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">40</div>
            </div>

            <!-- Parents -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 10a3 3 0 100-6 3 3 0 000 6zM17 10a3 3 0 100-6 3 3 0 000 6zM4 22v-2a4 4 0 014-4h0a4 4 0 014 4v2H4zm12 0v-2a4 4 0 014-4h0a4 4 0 014 4v2h-8z" />
                    </svg>
                    Parents
                </div>
                <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">510</div>
            </div>

            <!-- Accounts -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.105 0-2 .672-2 1.5S10.895 11 12 11s2 .672 2 1.5S13.105 14 12 14m0-6v1m0 5v1m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Total Revenue
                </div>
                <div class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">$128,900</div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div
            class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-900">
            <div class="p-4">
                <div class="flex items-center gap-2 mb-4 text-lg font-semibold text-gray-800 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                    </svg>
                    Recent Activity
                </div>
                <x-table.table>
                    <x-slot name="thead">
                        <tr>
                            <x-table.th>S.no</x-table.th>
                            <x-table.th>Name</x-table.th>
                            <x-table.th>Email</x-table.th>
                            <x-table.th>Action</x-table.th>
                        </tr>
                    </x-slot>
                    @for ($i = 0; $i <= 10; $i++)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            <x-table.td>{{ $i + 1 }}</x-table.td>
                            <x-table.td>Johne Doe</x-table.td>
                            <x-table.td>john@example.com</x-table.td>
                            <x-table.td>Active</x-table.td>
                        </tr>
                    @endfor

                </x-table.table>

            </div>
        </div>
    </div>
</x-layouts.app>
