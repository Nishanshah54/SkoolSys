<x-layouts.app :title="__('Dashboard | Teacher')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <!-- Stats Cards Row -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Classes Card -->

            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Active Classes</h3>
                        <p class="mt-1 text-2xl font-semibold text-neutral-900 dark:text-white">5</p>
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">3 classes today</p>
                    </div>
                    <div class="rounded-lg bg-blue-100 p-3 dark:bg-blue-900/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Students Card -->
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Total Students</h3>
                        <p class="mt-1 text-2xl font-semibold text-neutral-900 dark:text-white">127</p>
                        <p class="mt-1 text-xs text-green-600 dark:text-green-400">+8 this term</p>
                    </div>
                    <div class="rounded-lg bg-green-100 p-3 dark:bg-green-900/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Assignments Card -->
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Pending Grading</h3>
                        <p class="mt-1 text-2xl font-semibold text-neutral-900 dark:text-white">23</p>
                        <p class="mt-1 text-xs text-amber-600 dark:text-amber-400">4 overdue</p>
                    </div>
                    <div class="rounded-lg bg-amber-100 p-3 dark:bg-amber-900/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>

                        <!-- Notifications -->
<div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
    <h3 class="mb-3 text-lg font-semibold text-neutral-900 dark:text-white">Notifications</h3>
    <ul class="space-y-2 text-sm text-neutral-700 dark:text-neutral-300">
        <li class="flex justify-between items-center">
            <span>New message from Principal</span>
            <span class="text-xs text-blue-600 dark:text-blue-400">Just now</span>
        </li>
        <li class="flex justify-between items-center">
            <span>3 students submitted late assignments</span>
            <span class="text-xs text-amber-600 dark:text-amber-400">30 mins ago</span>
        </li>
        <li class="flex justify-between items-center">
            <span>Grade 10 exam schedule updated</span>
            <span class="text-xs text-neutral-400 dark:text-neutral-500">Today</span>
        </li>
    </ul>
</div>
<!-- Top Performing Students -->
<div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
    <h3 class="mb-3 text-lg font-semibold text-neutral-900 dark:text-white">Top Performers</h3>
    <ul class="space-y-2 text-sm">
        <li class="flex justify-between">
            <span class="text-neutral-700 dark:text-neutral-200">Ayesha Khan (Grade 9)</span>
            <span class="font-semibold text-green-600 dark:text-green-400">96%</span>
        </li>
        <li class="flex justify-between">
            <span class="text-neutral-700 dark:text-neutral-200">Daniel Roy (Grade 10)</span>
            <span class="font-semibold text-green-600 dark:text-green-400">93%</span>
        </li>
        <li class="flex justify-between">
            <span class="text-neutral-700 dark:text-neutral-200">Fatima Noor (Grade 8)</span>
            <span class="font-semibold text-green-600 dark:text-green-400">91%</span>
        </li>
    </ul>
</div>
<!-- Recent Activity Log -->
<div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
    <h3 class="mb-3 text-lg font-semibold text-neutral-900 dark:text-white">Recent Activities</h3>
    <ul class="text-sm text-neutral-700 dark:text-neutral-300 space-y-1">
        <li>✔️ <span class="text-green-600">English Quiz</span> graded for Grade 8</li>
        <li>📌 <span class="text-blue-600">Homework posted</span> in Science - Grade 10</li>
        <li>📥 <span class="text-amber-600">4 assignments submitted</span> in Mathematics</li>
        <li>🕓 <span class="text-neutral-500">PTM scheduled for Friday</span></li>
    </ul>
</div>


        </div>

        <!-- Main Content Area -->
        <div class="grid h-full flex-1 gap-4 md:grid-cols-3">
            <!-- Upcoming Classes -->
            <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800 md:col-span-2">
                <h3 class="mb-3 text-lg font-semibold text-neutral-900 dark:text-white">Today's Schedule</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between rounded-lg border border-neutral-200 p-3 dark:border-neutral-700">
                        <div>
                            <p class="font-medium text-neutral-900 dark:text-white">Mathematics - Grade 9</p>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">09:00 - 10:30 | Room 204</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
                    <div class="flex items-center justify-between rounded-lg border border-neutral-200 p-3 dark:border-neutral-700">
                        <div>
                            <p class="font-medium text-neutral-900 dark:text-white">Science - Grade 10</p>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">11:00 - 12:30 | Lab 3</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
                    <div class="flex items-center justify-between rounded-lg border border-neutral-200 p-3 dark:border-neutral-700">
                        <div>
                            <p class="font-medium text-neutral-900 dark:text-white">English - Grade 8</p>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">14:00 - 15:30 | Room 112</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
                <h3 class="mb-3 text-lg font-semibold text-neutral-900 dark:text-white">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-3">
                    <a href="#" class="flex flex-col items-center justify-center rounded-lg border border-neutral-200 p-3 text-center hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="mt-1 text-sm font-medium">New Assignment</span>
                    </a>
                    <a href="#" class="flex flex-col items-center justify-center rounded-lg border border-neutral-200 p-3 text-center hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="mt-1 text-sm font-medium">Grade Work</span>
                    </a>
                    <a href="#" class="flex flex-col items-center justify-center rounded-lg border border-neutral-200 p-3 text-center hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span class="mt-1 text-sm font-medium">Messages</span>
                    </a>
                    <a href="#" class="flex flex-col items-center justify-center rounded-lg border border-neutral-200 p-3 text-center hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="mt-1 text-sm font-medium">Schedule</span>
                    </a>
                    <a href="#" class="flex flex-col items-center justify-center rounded-lg border border-neutral-200 p-3 text-center hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-600 dark:text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 118 0v2M7 11h10M7 7h10" />
    </svg>
    <span class="mt-1 text-sm font-medium">Take Attendance</span>
</a>
<a href="#" class="flex flex-col items-center justify-center rounded-lg border border-neutral-200 p-3 text-center hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659M13 21H5a2 2 0 01-2-2V5a2 2 0 012-2h8a2 2 0 012 2v16z" />
    </svg>
    <span class="mt-1 text-sm font-medium">Announcement</span>
</a>
<a href="#" class="flex flex-col items-center justify-center rounded-lg border border-neutral-200 p-3 text-center hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600 dark:text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v9m0-9l-3 3m3-3l3 3M4 4h16v4H4V4z" />
    </svg>
    <span class="mt-1 text-sm font-medium">Upload Material</span>
</a>
<a href="#" class="flex flex-col items-center justify-center rounded-lg border border-neutral-200 p-3 text-center hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M4 6h8m-4 12h4m-4-6h6" />
    </svg>
    <span class="mt-1 text-sm font-medium">Live Class</span>
</a>

                </div>
            </div>

            <!-- Recent Announcements -->
            <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800 md:col-span-2">
                <h3 class="mb-3 text-lg font-semibold text-neutral-900 dark:text-white">Announcements</h3>
                <div class="space-y-3">
                    <div class="rounded-lg border border-neutral-200 p-3 dark:border-neutral-700">
                        <div class="flex items-start space-x-2">
                            <div class="mt-0.5 rounded-full bg-blue-100 p-1.5 dark:bg-blue-900/50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-neutral-900 dark:text-white">Staff Meeting Tomorrow</p>
                                <p class="text-sm text-neutral-500 dark:text-neutral-400">All teachers required to attend the monthly staff meeting at 3:30 PM in the conference room.</p>
                                <p class="mt-1 text-xs text-neutral-400 dark:text-neutral-500">Posted 2 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg border border-neutral-200 p-3 dark:border-neutral-700">
                        <div class="flex items-start space-x-2">
                            <div class="mt-0.5 rounded-full bg-green-100 p-1.5 dark:bg-green-900/50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-neutral-900 dark:text-white">Safety Protocol Update</p>
                                <p class="text-sm text-neutral-500 dark:text-neutral-400">Please review the updated safety protocols in the staff portal.</p>
                                <p class="mt-1 text-xs text-neutral-400 dark:text-neutral-500">Posted 1 day ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Progress -->
            <div class="rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-800">
                <h3 class="mb-3 text-lg font-semibold text-neutral-900 dark:text-white">Student Progress</h3>
                <div class="space-y-4">
                    <div>
                        <div class="mb-1 flex justify-between text-sm">
                            <span>Algebra II - Chapter 5</span>
                            <span>78%</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-neutral-200 dark:bg-neutral-700">
                            <div class="h-2 rounded-full bg-blue-600" style="width: 78%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 flex justify-between text-sm">
                            <span>Literature Essay</span>
                            <span>65%</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-neutral-200 dark:bg-neutral-700">
                            <div class="h-2 rounded-full bg-green-600" style="width: 65%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 flex justify-between text-sm">
                            <span>Science Project</span>
                            <span>42%</span>
                        </div>
                        <div class="h-2 w-full rounded-full bg-neutral-200 dark:bg-neutral-700">
                            <div class="h-2 rounded-full bg-amber-600" style="width: 42%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
