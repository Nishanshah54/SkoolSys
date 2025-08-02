<x-layouts.app :title="__('Dashboard | Student')">
    @php
        // Dummy data for upcoming assignments
        $upcomingAssignments = [
            (object)[
                'id' => 1,
                'title' => 'Linear Algebra Homework',
                'course' => (object)['name' => 'Mathematics'],
                'due_date' => now()->addDays(2),
                'is_submitted' => false,
            ],
            (object)[
                'id' => 2,
                'title' => 'Literature Essay',
                'course' => (object)['name' => 'English Literature'],
                'due_date' => now()->addDays(5),
                'is_submitted' => true,
            ],
            (object)[
                'id' => 3,
                'title' => 'Physics Lab Report',
                'course' => (object)['name' => 'Physics'],
                'due_date' => now()->addDays(1),
                'is_submitted' => false,
            ],
            (object)[
                'id' => 4,
                'title' => 'History Presentation',
                'course' => (object)['name' => 'World History'],
                'due_date' => now()->addWeek(),
                'is_submitted' => false,
            ],
        ];

        // Dummy data for recent grades
        $recentGrades = [
            (object)[
                'exam' => (object)[
                    'name' => 'Midterm Exam',
                    'date' => now()->subDays(10)
                ],
                'course' => (object)['name' => 'Mathematics'],
                'grade' => 85,
            ],
            (object)[
                'exam' => (object)[
                    'name' => 'Chapter Test',
                    'date' => now()->subDays(5)
                ],
                'course' => (object)['name' => 'Physics'],
                'grade' => 72,
            ],
            (object)[
                'exam' => (object)[
                    'name' => 'Essay Assignment',
                    'date' => now()->subDays(3)
                ],
                'course' => (object)['name' => 'English Literature'],
                'grade' => 68,
            ],
        ];
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <!-- Welcome Header with Quick Actions -->
        <div class="flex flex-col justify-between gap-4 rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800 md:flex-row md:items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Welcome back, {{ Auth::user()->name ?? 'Student' }}!</h1>
               <p class="text-gray-600 dark:text-gray-300"> Here's what's happening today – {{ now()->format('l, F jS') }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('student.timetable') }}" class="rounded-lg bg-blue-100 px-4 py-2 text-sm font-medium text-blue-700 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-100 dark:hover:bg-blue-800">
                    Today's Classes
                </a>
                <a href="{{ route('student.assignments') }}" class="rounded-lg bg-purple-100 px-4 py-2 text-sm font-medium text-purple-700 hover:bg-purple-200 dark:bg-purple-900 dark:text-purple-100 dark:hover:bg-purple-800">
                    Pending Assignments
                </a>
            </div>
        </div>

        <!-- Top Grid Section -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Personal Profile Card -->
            <div class="relative rounded-xl border border-neutral-200 bg-white p-4 transition-colors hover:border-blue-500 dark:border-neutral-700 dark:bg-neutral-800 dark:hover:border-blue-400">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-200">
                        👤
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Personal Profile</h2>
                </div>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    View and manage your personal information and account settings.
                </p>
                <div class="mt-4 flex items-center justify-between">
                    <a href="{{ route('student.profile') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                        Go to Profile →
                    </a>
                    <span class="text-xs text-gray-500 dark:text-gray-400">Last updated: 2 days ago</span>
                </div>
            </div>

            <!-- Timetable & Results Card -->
            <div class="relative rounded-xl border border-neutral-200 bg-white p-4 transition-colors hover:border-green-500 dark:border-neutral-700 dark:bg-neutral-800 dark:hover:border-green-400">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-200">
                        📚
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Timetable & Results</h2>
                </div>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    Access your class schedule and exam results.
                </p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <a href="{{ route('student.timetable') }}" class="rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700 hover:bg-green-100 dark:bg-green-900/50 dark:text-green-200">
                        View Schedule
                    </a>
                    <a href="{{ route('student.results') }}" class="rounded-full bg-purple-50 px-3 py-1 text-xs font-medium text-purple-700 hover:bg-purple-100 dark:bg-purple-900/50 dark:text-purple-200">
                        Exam Results
                    </a>
                </div>
            </div>

            <!-- School Updates Card -->
            <div class="relative rounded-xl border border-neutral-200 bg-white p-4 transition-colors hover:border-orange-500 dark:border-neutral-700 dark:bg-neutral-800 dark:hover:border-orange-400">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-orange-100 text-orange-600 dark:bg-orange-900 dark:text-orange-200">
                        📰
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">School Updates</h2>
                </div>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    Stay up to date with school news and announcements.
                </p>
                <div class="mt-4 flex items-center justify-between">
                    <a href="{{ route('student.updates') }}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                        Read Updates →
                    </a>
                    <span class="flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs text-white">3</span>
                </div>
            </div>
        </div>

        <!-- Middle Grid Section -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <!-- Upcoming Assignments -->
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">📝 Upcoming Assignments</h2>
                    <a href="{{ route('student.assignments') }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">View All</a>
                </div>
                <div class="mt-4 space-y-4">
                    @foreach($upcomingAssignments as $assignment)
                    <div class="rounded-lg border border-neutral-100 p-4 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700/50">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-800 dark:text-white">{{ $assignment->title }}</h3>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $assignment->due_date->diffForHumans() }}</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ $assignment->course->name }}</p>
                        <div class="mt-2 flex items-center justify-between">
                            <span class="text-xs font-medium {{ $assignment->is_submitted ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                {{ $assignment->is_submitted ? 'Submitted' : 'Pending' }}
                            </span>
                            <a href="{{ route('student.assignment.show', $assignment->id) }}" class="text-xs text-blue-600 hover:underline dark:text-blue-400">View Details</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Grades -->
            <div class="rounded-xl border border-neutral-200 bg-white p-6 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">🏆 Recent Grades</h2>
                    <a href="{{ route('student.results') }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">View All</a>
                </div>
                <div class="mt-4 space-y-4">
                    @foreach($recentGrades as $grade)
                    <div class="flex items-center justify-between rounded-lg border border-neutral-100 p-4 hover:bg-neutral-50 dark:border-neutral-700 dark:hover:bg-neutral-700/50">
                        <div>
                            <h3 class="font-medium text-gray-800 dark:text-white">{{ $grade->exam->name }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $grade->course->name }}</p>
                        </div>
                        <div class="text-right">
                            <span class="block text-lg font-bold {{ $grade->grade >= 70 ? 'text-green-600 dark:text-green-400' : ($grade->grade >= 50 ? 'text-yellow-600 dark:text-yellow-400' : 'text-red-600 dark:text-red-400') }}">
                                {{ $grade->grade }}%
                            </span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $grade->exam->date->format('M d, Y') }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Full-width Panel -->
        <div class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition-colors dark:border-neutral-700 dark:bg-neutral-800">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">📅 Academic Calendar</h2>
                <div class="flex gap-2">
                    <button class="rounded-lg bg-neutral-100 px-3 py-1 text-sm font-medium text-gray-700 hover:bg-neutral-200 dark:bg-neutral-700 dark:text-white">
                        Month
                    </button>
                    <button class="rounded-lg bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-100">
                        Week
                    </button>
                    <button class="rounded-lg bg-neutral-100 px-3 py-1 text-sm font-medium text-gray-700 hover:bg-neutral-200 dark:bg-neutral-700 dark:text-white">
                        Day
                    </button>
                </div>
            </div>
            <div class="mt-4">
                <div class="h-96 rounded-lg border border-neutral-100 bg-neutral-50 p-4 dark:border-neutral-700 dark:bg-neutral-700/50">
                    <!-- Calendar would be rendered here -->
                    <div class="flex h-full items-center justify-center text-gray-400 dark:text-gray-500">
                        Calendar view would appear here
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
