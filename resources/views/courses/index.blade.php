<x-layouts.app :title="__('Dashboard | Course List')">
<div class="max-w-7xl mx-auto p-6 bg-white dark:bg-[#0f101b] rounded-lg shadow-lg">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Course Management</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Manage all courses and their details</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <a href="{{ route('courses.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg inline-flex items-center gap-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add New Course
            </a>

            <a href="#" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg inline-flex items-center gap-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                Export
            </a>
        </div>
    </div>

    <!-- Search and Filter Bar -->
    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="col-span-1 md:col-span-2">
                <div class="relative">
                    <input type="text" placeholder="Search courses..."
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <select class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Departments</option>
                {{-- @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach --}}
            </select>

            <select class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Credit Values</option>
                <option value="1">1 Credit</option>
                <option value="2">2 Credits</option>
                <option value="3">3 Credits</option>
                <option value="4">4 Credits</option>
            </select>
        </div>
    </div>

    <!-- Status Messages -->
    @if (session('success'))
        <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg mb-6 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
            <button type="button" class="text-green-600 dark:text-green-300 hover:text-green-800 dark:hover:text-green-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif

    <!-- Course Table -->
    <x-table.table>
        <x-slot name="thead">
            <tr>
                <x-table.th sortable>Code</x-table.th>
                <x-table.th>Name</x-table.th>
                <x-table.th>Department</x-table.th>
                <x-table.th>Credits</x-table.th>
                <x-table.th>Status</x-table.th>
                <x-table.th class="text-right">Actions</x-table.th>
            </tr>
        </x-slot>

        @foreach ($courses as $course)
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
            <x-table.td>{{ $course->code }}</x-table.td>
            <x-table.td>{{ $course->name }}</x-table.td>
            <x-table.td>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                    {{ $course->department }}
                </span>
            </x-table.td>
            <x-table.td>{{ $course->credits }}</x-table.td>
            <x-table.td>
                @if($course->is_active)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                        Active
                    </span>
                @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                        Inactive
                    </span>
                @endif
            </x-table.td>
            <x-table.td class="text-right">
                <div class="flex justify-end gap-2">
                    <a href="{{ route('courses.show', $course) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="{{ route('courses.edit', $course) }}" class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" title="Delete" onclick="return confirm('Are you sure you want to delete this course?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </x-table.td>
        </tr>
        @endforeach
    </x-table.table>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $courses->links() }}
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-900 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Courses</h3>
                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-1">{{ $totalCourses ?? 12 }}</p>
                </div>
                <div class="bg-blue-100 dark:bg-blue-800 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-900 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Active Courses</h3>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-1">{{ $activeCourses ?? 12 }}</p>
                </div>
                <div class="bg-green-100 dark:bg-green-800 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-purple-50 dark:bg-purple-900/20 border border-purple-100 dark:border-purple-900 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Departments</h3>
                    <p class="text-2xl font-bold text-purple-600 dark:text-purple-400 mt-1">{{ $departmentCount ?? 12}}</p>
                </div>
                <div class="bg-purple-100 dark:bg-purple-800 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.app>
