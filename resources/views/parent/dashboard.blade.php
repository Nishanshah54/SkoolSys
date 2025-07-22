<x-layouts.app :title="__('Dashboard | Parent')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        {{-- Top Grid Panels --}}
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">

            {{-- Student Summary --}}
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                        <span class="text-blue-600 dark:text-blue-300 font-medium">JD</span>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">John Doe</h2>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Grade 5, Section A</p>
                    </div>
                </div>
                <div class="mt-4 grid grid-cols-2 gap-2">
                    <div class="rounded-lg bg-blue-50 dark:bg-blue-900/30 p-2  text-gray-800 dark:text-white">
                        <p class="text-xs text-gray-500 dark:text-gray-400">Age</p>
                        <p class="font-medium">10</p>
                    </div>
                    <div class="rounded-lg bg-green-50 dark:bg-green-900/30 p-2">
                        <p class="text-xs text-gray-500 dark:text-gray-400">Class Teacher</p>
                        <p class="font-medium">Ms. Smith</p>
                    </div>
                </div>
            </div>

            {{-- Academic Performance --}}
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Academic Performance</h2>
                <div class="mt-2 space-y-2">
                    <div>
                        <div class="flex justify-between text-sm">
                            <span>Mathematics</span>
                            <span class="font-medium text-green-600">A (92%)</span>
                        </div>
                        <div class="mt-1 h-2 w-full rounded-full bg-gray-200">
                            <div class="h-2 rounded-full bg-green-500" style="width: 92%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span>Science</span>
                            <span class="font-medium text-yellow-600">B+ (85%)</span>
                        </div>
                        <div class="mt-1 h-2 w-full rounded-full bg-gray-200">
                            <div class="h-2 rounded-full bg-yellow-500" style="width: 85%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span>English</span>
                            <span class="font-medium text-red-600">C (72%)</span>
                        </div>
                        <div class="mt-1 h-2 w-full rounded-full bg-gray-200">
                            <div class="h-2 rounded-full bg-red-500" style="width: 72%"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Attendance & Fee --}}
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Attendance & Fee</h2>
                <div class="mt-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm">Attendance Rate</span>
                        <span class="font-medium text-green-600">95%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 95%"></div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm">Fee Status</span>
                            <span class="font-medium text-red-600">Pending</span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Due: 5 days ago | Amount: $250</p>
                        <button class="mt-2 w-full py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                            Pay Now
                        </button>
                    </div>
                </div>
            </div>

            {{-- Upcoming Events --}}
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Upcoming Events</h2>
                <div class="mt-3 space-y-3">
                    <div class="flex items-start gap-2">
                        <div class="flex-shrink-0 mt-1 p-1 bg-blue-100 dark:bg-blue-900 rounded">
                            <svg class="w-4 h-4 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Parent-Teacher Meeting</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">25th July, 10:00 AM - 12:00 PM</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <div class="flex-shrink-0 mt-1 p-1 bg-purple-100 dark:bg-purple-900 rounded">
                            <svg class="w-4 h-4 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Science Fair Submission</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">30th July</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <div class="flex-shrink-0 mt-1 p-1 bg-red-100 dark:bg-red-900 rounded">
                            <svg class="w-4 h-4 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium">School Closed</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Friday, 28th July</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Quick Actions</h2>
                <div class="mt-4 grid grid-cols-2 gap-3">
                    <button class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg bg-blue-50 dark:bg-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                        <span class="text-xs">Message Teacher</span>
                    </button>
                    <button class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg bg-green-50 dark:bg-green-900/30 hover:bg-green-100 dark:hover:bg-green-900/50 transition">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <span class="text-xs">View Report Card</span>
                    </button>
                    <button class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg bg-purple-50 dark:bg-purple-900/30 hover:bg-purple-100 dark:hover:bg-purple-900/50 transition">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-xs">Request Meeting</span>
                    </button>
                    <button class="flex flex-col items-center justify-center gap-1 p-2 rounded-lg bg-yellow-50 dark:bg-yellow-900/30 hover:bg-yellow-100 dark:hover:bg-yellow-900/50 transition">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <span class="text-xs">Update Profile</span>
                    </button>
                </div>
            </div>

            {{-- Notifications --}}
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Notifications</h2>
                    <span class="text-xs bg-red-500 text-white rounded-full px-2 py-0.5">3 new</span>
                </div>
                <div class="mt-3 space-y-3 max-h-40 overflow-y-auto">
                    <div class="flex gap-2 p-2 rounded-lg bg-blue-50/50 dark:bg-blue-900/20">
                        <div class="flex-shrink-0 mt-0.5">
                            <div class="h-2 w-2 rounded-full bg-blue-500"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium">New assignment uploaded</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Math homework due tomorrow</p>
                        </div>
                    </div>
                    <div class="flex gap-2 p-2 rounded-lg bg-yellow-50/50 dark:bg-yellow-900/20">
                        <div class="flex-shrink-0 mt-0.5">
                            <div class="h-2 w-2 rounded-full bg-yellow-500"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Library book overdue</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">"Science Encyclopedia" due 3 days ago</p>
                        </div>
                    </div>
                    <div class="flex gap-2 p-2 rounded-lg bg-red-50/50 dark:bg-red-900/20">
                        <div class="flex-shrink-0 mt-0.5">
                            <div class="h-2 w-2 rounded-full bg-red-500"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Absence noted</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">John was absent on 20th July</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Section --}}
        <div class="grid gap-4 md:grid-cols-2">

            {{-- Performance Overview --}}
            <div class="relative h-full overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Performance Trend</h2>
                <div class="mt-4 h-64">
                    {{-- Replace with actual chart component --}}
                    <div class="flex items-end justify-between h-48 pt-4">
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-blue-200 dark:bg-blue-700 rounded-t-sm" style="height: 60%"></div>
                            <p class="mt-1 text-xs">Math</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-green-200 dark:bg-green-700 rounded-t-sm" style="height: 75%"></div>
                            <p class="mt-1 text-xs">Science</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-yellow-200 dark:bg-yellow-700 rounded-t-sm" style="height: 40%"></div>
                            <p class="mt-1 text-xs">English</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-purple-200 dark:bg-purple-700 rounded-t-sm" style="height: 85%"></div>
                            <p class="mt-1 text-xs">History</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-8 bg-red-200 dark:bg-red-700 rounded-t-sm" style="height: 55%"></div>
                            <p class="mt-1 text-xs">Art</p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4 text-xs text-gray-500 dark:text-gray-400">
                        <span>Term 1</span>
                        <span>Term 2</span>
                        <span>Term 3</span>
                    </div>
                </div>
            </div>

            {{-- Recent Activities --}}
            <div class="relative h-full overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-900 p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Recent Activities</h2>
                <div class="mt-4 space-y-4 max-h-64 overflow-y-auto">
                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Assignment submitted</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Science project - 22nd July, 3:45 PM</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium">New material posted</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Math Chapter 5 - 21st July, 10:15 AM</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center">
                                <svg class="w-4 h-4 text-yellow-600 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Late arrival</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">20th July, 9:30 AM</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-8 w-8 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Behavior note</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Participated well in class - 19th July</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
