<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <!-- Header with Greeting and Search -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800 dark:text-white">SkoolSys Admin Dashboard</h1>
                <p class="text-gray-500 dark:text-gray-400">Welcome back, {{ Auth::user()->name }}!</p>
            </div>
            <div class="relative w-full sm:w-64">
                <input type="text" placeholder="Search..."
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- Stats Cards with Growth Indicators -->
        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-4">
            @php $data=array_diff_assoc($count); @endphp

            <!-- Students Card -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <a href="{{ route('admin.students.index') }}" class="hover:text-green-400">Students</a>
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">+12%</span>
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">
                    <a href="{{ route('admin.students.index') }}"
                        class="hover:text-green-400">{{ $data['total_student'] }}</a>
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Total enrolled students</div>
            </div>

            <!-- Teachers Card -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-green-400">Teachers</a>
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">+5%</span>
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">
                    <a href="{{ route('admin.dashboard') }}"
                        class="hover:text-green-400">{{ $data['total_teacher'] }}</a>
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Teaching staff</div>
            </div>

            <!-- Parents Card -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <a href="#" class="hover:text-green-400">Parents</a>
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">+8%</span>
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">
                    <span>{{ $data['total_parent'] }}</span>
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Registered parents</div>
            </div>

            <!-- Revenue Card -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 8.25H9m6 3H9m3 6-3-3h1.5a3 3 0 1 0 0-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Total Revenue
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">+22%</span>
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">$128,900</div>
                <div class="text-xs text-gray-500 dark:text-gray-400">This fiscal year</div>
            </div>
        </div>

        <!-- Main Content Area -->
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
                        <a href="#" class="text-sm text-green-500 hover:underline">View All</a>
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

                        <a href="#"
                            class="p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500 mb-2"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="text-sm font-medium">Create Class</span>
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
    </div>
</x-layouts.app>
