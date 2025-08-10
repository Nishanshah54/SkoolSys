<x-layouts.app :title="__('Dashboard | Schedules')">
    <div class="flex flex-col h-full w-full gap-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex p-5 gap-2">
                <div class="text-9xl text-yellow-300 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-clock-icon lucide-clipboard-clock "><path d="M16 14v2.2l1.6 1"/><path d="M16 4h2a2 2 0 0 1 2 2v.832"/><path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h2"/><circle cx="16" cy="16" r="6"/><rect x="8" y="2" width="8" height="4" rx="1"/></svg>
                </div>
                <div class="justify-center">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Schedules</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Manage all class schedules in one place
                    </p>
                </div>
            </div>
            <a href="{{ route('schedules.create') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 hover:bg-green-800 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Schedule
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
            <div class="bg-white dark:bg-[#10100f] rounded-lg border border-gray-200 dark:border-gray-700 p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Schedules</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white mt-1">{{ $schedules->count() }}
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>


            <div class="bg-white dark:bg-[#10100f] rounded-lg border border-gray-200 dark:border-gray-700  p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Other Features Available Soon...</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white mt-1">
                            {{ $activeClassesCount ?? '---' }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
            </div>


            <div class="bg-white dark:bg-[#10100f] rounded-lg border border-gray-200 dark:border-gray-700  p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Teachers Assigned</p>
                        <p class="text-2xl font-semibold text-gray-900 dark:text-white mt-1">{{ $teachers_count ?? '0' }}

                        </p>
                    </div>
                    <div
                        class="p-3 rounded-full bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>


        <!-- Table Section -->
        <div
            class="bg-white text-black dark:text-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
    <thead class="dark:bg-gray-900">
        <tr>
            <x-table.th>#</x-table.th>
            <x-table.th>Class</x-table.th>
            <x-table.th>Subject</x-table.th>
            <x-table.th>Teacher</x-table.th>
            <x-table.th>Day</x-table.th>
            <x-table.th>Time</x-table.th>
            <x-table.th>Actions</x-table.th>
        </tr>
    </thead>
    <tbody class="bg-white dark:bg-[#10100f] divide-y divide-gray-200 dark:divide-gray-700">
        @forelse ($schedules as $schedule)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                <x-table.td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                    {{ $loop->iteration }}
                </x-table.td>
                <x-table.td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                    {{ $schedule->grade->name }}
                </x-table.td>
                <x-table.td>
                    {{ $schedule->subject->name }}
                </x-table.td>
                <x-table.td>
                    {{ $schedule->teacher->name }}
                </x-table.td>
                <x-table.td>
                    {{ $schedule->day_of_week }}
                </x-table.td>
                <x-table.td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                    </span>
                </x-table.td>
                <x-table.td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                    <div class="flex justify-left space-x-2">
                        <a href="{{ route('schedules.edit', $schedule) }}"
                           class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors"
                           title="Edit Schedule">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>

                        <form action="{{ route('schedules.destroy', $schedule) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this schedule?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                    title="Delete Schedule">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </x-table.td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                    <div class="flex flex-col items-center justify-center py-8">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-12 w-12 text-gray-400 dark:text-gray-500 mb-3" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-600 dark:text-gray-300">No schedules found</h3>
                        <p class="text-gray-500 dark:text-gray-400 mt-1">Get started by adding a new schedule</p>
                        <a href="{{ route('schedules.create') }}"
                           class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Add Schedule
                        </a>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody class="dark:bg-gray-900">
</table>

            </div>

            @if ($schedules->hasPages())
                <div class="bg-gray-50 dark:bg-gray-700/30 px-6 py-3 border-t border-gray-200 dark:border-gray-700">
                    {{ $schedules->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
