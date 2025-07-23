<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="p-4 sm:p-6 space-y-6">
        <!-- Header Section with Breadcrumbs -->
        <div class="flex flex-col space-y-4 sm:space-y-0 sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <nav class="flex mb-2" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Students</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    {{ __('Manage Students') }}
                </h1>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('students.add') }}"
                    class="flex items-center justify-center gap-2 sm:w-auto px-4 py-2 rounded-md text-sm font-medium bg-black text-white hover:bg-gray-700 text-center border border-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {{ __('Add Student') }}
                </a>
                <button onclick="printStudentList()"
                    class="flex items-center justify-center gap-2 sm:w-auto px-4 py-2 rounded-md text-sm font-medium bg-white text-gray-800 hover:bg-gray-100 text-center border border-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Print List
                </button>
                <button onclick="exportToExcel()"
                    class="flex items-center justify-center gap-2 sm:w-auto px-4 py-2 rounded-md text-sm font-medium bg-green-600 text-white hover:bg-green-700 text-center border border-green-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export Excel
                </button>
            </div>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="p-4 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-300 dark:border-green-700">
                <x-ui.alert variant="success" :title="__('Success')" :description="session('success')" />
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Students</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $total }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-2">
                    {{-- <span class="text-xs text-green-600 dark:text-green-400 font-medium">+{{ round(($total - $lastMonthTotal)/max(1, $lastMonthTotal)*100) }}% from last month</span> --}}
                    <span class="text-xs text-green-600 dark:text-green-400 font-medium">+32% from last month</span>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Active Students</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">1212</p>
                        {{-- <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $activeStudents }}</p> --}}
                    </div>
                    <div class="p-3 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="text-xs text-gray-500 dark:text-gray-400">50% of total</span>
                    {{-- <span class="text-xs text-gray-500 dark:text-gray-400">{{ round($activeStudents/$total*100) }}% of total</span> --}}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Inactive Students</p>
                        {{-- <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $inactiveStudents }}</p> --}}
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">12</p>
                    </div>
                    <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-2">
                    {{-- <span class="text-xs text-gray-500 dark:text-gray-400">{{ round($inactiveStudents/$total*100) }}% of total</span> --}}
                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ 100 }}% of total</span>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Trashed Students</p>
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $trashed }}</p>
                    </div>
                    <div class="p-3 rounded-full bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="{{ route('admin.students.index', ['view' => 'trash']) }}" class="text-xs text-blue-600 dark:text-blue-400 hover:underline">View trashed</a>
                </div>
            </div>
        </div>

        <!-- Filter and Search Controls -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <!-- Filter Links -->
                <div class="flex flex-wrap gap-2">
                    <a class="px-3 py-1 rounded text-sm {{ request()->get('status') === null ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-gray-100 dark:bg-gray-700' }}"
                       href="{{ route('admin.students.index') }}">
                       All ({{ $total }})
                    </a>
                    <a class="px-3 py-1 rounded text-sm {{ request()->get('status') === 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-gray-100 dark:bg-gray-700' }}"
                       href="{{ route('admin.students.index', ['status' => 'active']) }}">
                       {{-- Active ({{ $activeStudents }}) --}}
                       Active (120)
                    </a>
                    <a class="px-3 py-1 rounded text-sm {{ request()->get('status') === 'inactive' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : 'bg-gray-100 dark:bg-gray-700' }}"
                       href="{{ route('admin.students.index', ['status' => 'inactive']) }}">
                       Inactive ({{ $inactiveStudents ?? 10 }})
                    </a>
                    <a class="px-3 py-1 rounded text-sm {{ request('view') === 'trash' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' : 'bg-gray-100 dark:bg-gray-700' }}"
                       href="{{ route('admin.students.index', ['view' => 'trash']) }}">
                       Trash ({{ $trashed }})
                    </a>
                </div>

                <!-- Search and Bulk Actions -->
                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <form action="{{ route('admin.students.index') }}" method="get" class="flex items-center gap-2 w-full">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search students...">
                        </div>
                        <x-ui.button type="submit" variant="primary" class="whitespace-nowrap">Search</x-ui.button>
                    </form>
                </div>
            </div>

            <!-- Advanced Filters (Collapsible) -->
            <div class="mt-4">
                <button onclick="toggleAdvancedFilters()" class="flex items-center text-sm text-blue-600 dark:text-blue-400 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    Advanced Filters
                </button>

                <div id="advancedFilters" class="hidden mt-3 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <form method="GET" action="{{ route('admin.students.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Education Level Filter -->
                        <div>
                            <label for="education" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Education Level</label>
                            <select id="education" name="education" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">All Levels</option>
                                <option value="primary" {{ request('education') == 'primary' ? 'selected' : '' }}>Primary</option>
                                <option value="secondary" {{ request('education') == 'secondary' ? 'selected' : '' }}>Secondary</option>
                                <option value="higher" {{ request('education') == 'higher' ? 'selected' : '' }}>Higher</option>
                            </select>
                        </div>

                        <!-- Date Range Filter -->
                        <div>
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Joined After</label>
                            <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div>
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Joined Before</label>
                            <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="md:col-span-3 flex justify-end gap-2">
                            <button type="reset" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                                Reset
                            </button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                                Apply Filters
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Student Table -->
        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700">
            <x-table.table class="min-w-full">
                <x-slot name="thead">
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <x-table.th class="w-16">
                            <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </x-table.th>
                        <x-table.th sortable column="name">Name</x-table.th>
                        <x-table.th sortable column="student_id">Student ID</x-table.th>
                        <x-table.th sortable column="education">Education</x-table.th>
                        <x-table.th>Contact</x-table.th>
                        <x-table.th sortable column="created_at">Joined</x-table.th>
                        <x-table.th class="text-right">Actions</x-table.th>
                    </tr>
                </x-slot>

                @forelse ($students as $student)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <x-table.td>
                            <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </x-table.td>
                        <x-table.td>
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ $student->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode($student->name).'&color=7F9CF5&background=EBF4FF' }}" alt="{{ $student->name }}">
                                </div>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $student->name }}</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">{{ $student->email }}</div>
                                </div>
                            </div>
                        </x-table.td>
                        <x-table.td>
                            <span class="font-mono bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-sm">{{ $student->student_id }}</span>
                        </x-table.td>
                        <x-table.td class="capitalize">
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $student->education === 'primary' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : ($student->education === 'secondary' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200') }}">
                                {{ $student->education }}
                            </span>
                        </x-table.td>
                        <x-table.td>
                            <div class="text-sm text-gray-900 dark:text-white">{{ $student->mobile_number }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $student->address ?? 'No address' }}</div>
                        </x-table.td>
                        <x-table.td>
                            <div class="text-sm text-gray-900 dark:text-white">{{ $student->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $student->created_at->diffForHumans() }}</div>
                        </x-table.td>
                        <x-table.td class="text-right">
                            <x-dropdown-button label="Actions">
                                @if (request('view') === 'trash')
                                    <!-- Restore Option -->
                                    <form method="POST" action="{{ route('students.restore', $student->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-left block px-4 py-2 text-sm text-green-600 dark:text-green-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                            </svg>
                                            Restore
                                        </button>
                                    </form>

                                    <!-- Permanent Delete Option -->
                                    <form method="POST" action="{{ route('students.forceDelete', $student->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full text-left block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Delete Permanently
                                        </button>
                                    </form>
                                @else
                                    <!-- View Option -->
                                    <a href="{{ route('students.show', $student->id) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        View Details
                                    </a>

                                    <!-- Edit Option -->
                                    <a href="{{ route('students.edit', $student->id) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>

                                    <!-- Soft Delete / Trash Option -->
                                    <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full text-left block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Move to Trash
                                        </button>
                                    </form>
                                @endif
                            </x-dropdown-button>
                        </x-table.td>
                    </tr>
                @empty
                    <tr>
                        <x-table.td colspan="7" class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No students found</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                @if(request('view') === 'trash')
                                    Your trash is empty
                                @else
                                    Get started by <a href="{{ route('students.add') }}" class="text-blue-600 hover:underline dark:text-blue-400">adding a new student</a>
                                @endif
                            </p>
                        </x-table.td>
                    </tr>
                @endforelse
            </x-table.table>
        </div>

        <!-- Pagination and Bulk Actions -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-sm text-gray-700 dark:text-gray-400">
                Showing <span class="font-medium">{{ $students->firstItem() }}</span> to <span class="font-medium">{{ $students->lastItem() }}</span> of <span class="font-medium">{{ $students->total() }}</span> results
            </div>

            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-700 dark:text-gray-400">Per page:</span>
                    <select onchange="window.location.href = this.value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="{{ request()->fullUrlWithQuery(['per_page' => 25]) }}" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="{{ request()->fullUrlWithQuery(['per_page' => 100]) }}" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>

                {{ $students->links() }}
            </div>
        </div>
    </div>

    <script>
        function toggleAdvancedFilters() {
            const filters = document.getElementById('advancedFilters');
            filters.classList.toggle('hidden');
        }

        function printStudentList() {
            // Implement print functionality
            window.print();
        }

        function exportToExcel() {
            // Implement Excel export functionality
            alert('Export to Excel functionality will be implemented here');
        }
    </script>
</x-layouts.app>
