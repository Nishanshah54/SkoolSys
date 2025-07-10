<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <!-- Header -->
        <div class="flex items-center gap-2 text-3xl font-semibold text-gray-800 dark:text-white">
            SkoolSys Admin Dashboard
        </div>

        <!-- Stats Cards -->
        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-4">
            <!-- Students -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>

                    Students
                </div>
                <div class="mt-2  text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">
                    <strong>1000</strong>

                </div>
            </div>

            <!-- Teachers -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                 </svg>
                    Teachers
                </div>
                <div class="mt-2 text-3xl text-center p-8  font-bold text-gray-900 dark:text-white">
                    <span>50</span>

                </div>
            </div>

            <!-- Parents -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>

                    Parents
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">510</div>
            </div>

            <!-- Accounts -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900">
                <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>

                    Total Revenue
                </div>
                <div class="mt-2 text-3xl text-center p-8  font-bold text-gray-900 dark:text-white">$128,900</div>
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
