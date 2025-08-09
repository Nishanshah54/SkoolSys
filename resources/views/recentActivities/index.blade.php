<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Activity (2/3 width) -->
            <div
                class="lg:col-span-2 overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-900">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2 text-lg font-semibold text-gray-800 dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                            </svg>
                            Recent Activity
                        </div>
                        <a href="{{route('recent.activites')}}" class="text-sm text-green-500 hover:underline">View All</a>
                    </div>

                    <div class="overflow-x-auto">
                        <x-table.table>
                            <x-slot name="thead">
                                <tr>
                                    <x-table.th>#</x-table.th>
                                    <x-table.th>User</x-table.th>
                                    <x-table.th>Activity</x-table.th>
                                    <x-table.th>Target</x-table.th>
                                    <x-table.th>ID</x-table.th>
                                    <x-table.th>Time</x-table.th>
                                    <x-table.th>Status</x-table.th>
                                </tr>
                            </x-slot>
                            @forelse ($activities as $index => $activity)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                    <x-table.td>{{ $index + 1 }}</x-table.td>

                                    <x-table.td class="flex items-center gap-2">
                                        <div
                                            class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                            <span class="text-xs font-medium">
                                                {{ strtoupper(substr($activity->user->name ?? 'NA', 0, 2)) }}
                                            </span>
                                        </div>
                                        <span>{{ $activity->user->name ?? 'System' }}
                                            ({{ $activity->actor_type }})</span>
                                    </x-table.td>

                                    <x-table.td>{{ $activity->action }}</x-table.td>
                                    <x-table.td>{{ $activity->target_type }}</x-table.td>
                                    <x-table.td>{{ $activity->target_id }}</x-table.td>
                                    <x-table.td>{{ $activity->created_at->diffForHumans() }}</x-table.td>

                                    <x-table.td>
                                        <span
                                            class="px-2 py-1 text-xs rounded-full
            @if ($activity->status === 'Active') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
            @elseif($activity->status === 'Info') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
            @elseif($activity->status === 'Warning') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
            @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                                            {{ $activity->status }}
                                        </span>
                                    </x-table.td>
                                </tr>
                            @empty
                                <tr>
                                    <x-table.td colspan="5" class="text-center text-gray-500 dark:text-gray-400">
                                        No activity found.
                                    </x-table.td>
                                </tr>
                            @endforelse

                        </x-table.table>
                    </div>
                </div>
            </div>

            <!-- Quick Actions (1/3 width) -->
            <div
                class="overflow-hidden rounded-xl border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-neutral-900">
                <div class="p-4">
                    <div class="flex items-center gap-2 text-lg font-semibold text-gray-800 dark:text-white mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Quick Actions
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('students.add') }}"
                            class="p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500 mb-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="text-sm font-medium">Add Student</span>
                        </a>
                        <a href="{{route('admin.teacher.create')}}"
                            class="p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus-icon lucide-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                            <span class= text-sm font-medium">Add Teacher</span>
                        </a>

                        <a href="{{route('schedules.index')}}"
                            class="p-3 rounded-lg border  border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-check-icon lucide-calendar-check text-green-600 pt-3"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg>
                            <span class="text-sm font-medium pt-3">Create Schedule</span>
                        </a>
                        <a href="{{route('schedules.index')}}"
                            class="p-3 rounded-lg border  border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition flex flex-col items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open-icon lucide-book-open text-green-600"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg>
                            <span class="text-sm font-medium pt-3">Create Class</span>
                        </a>

                        <a href="#"
                            class="p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500 mb-2"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span class="text-sm font-medium">Generate Report</span>
                        </a>

                        <a href="#"
                            class="p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500 mb-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span class="text-sm font-medium">Process Payment</span>
                        </a>
                    </div>

                    <!-- Calendar Widget -->
                    <div class="mt-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-medium text-gray-800 dark:text-white">Upcoming Events</h3>
                            <a href="#" class="text-xs text-green-500 hover:underline">View Calendar</a>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div
                                    class="flex flex-col items-center justify-center p-2 rounded bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                    <span class="text-sm font-bold">15</span>
                                    <span class="text-xs">JUN</span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium">Parent-Teacher Meeting</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">10:00 AM - 12:00 PM</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="flex flex-col items-center justify-center p-2 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                    <span class="text-sm font-bold">20</span>
                                    <span class="text-xs">JUN</span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium">Sports Day</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">All Day Event</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
