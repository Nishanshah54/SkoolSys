<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="p-4 sm:p-6 space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-stretch gap-4">
            <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                {{ __('Manage Students') }}
            </p>
            <a href="{{ route('students.add') }}"
                class="sm:w-auto px-4 py-2 rounded-md text-sm font-medium  bg-black text-white hover:bg-gray-700 text-center border border-gray-300 ">
                {{ __('Add Students') }}
            </a>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="p-4 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-300 dark:border-green-700">
                {{ session('success') }}
            </div>
        @endif

        <!-- Section Title -->
        <p class="text-xl font-semibold text-center text-gray-800 dark:text-gray-100">
            {{ __('All Students') }}
        </p>

        <!-- Filter and Search Controls -->
        <div class="mb-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-back dark:text-white">
                <!-- Filter Links -->
                <div class="flex justify-center sm:justify-start flex-wrap gap-2 text-sm">
                    <a class="px-3 py-1 rounded bg-gray-100 dark:bg-gray-700 text-center" href="{{route('admin.students.index'      )}}">All: ({{$total}})</a>
                   <a class="px-3 py-1 rounded bg-gray-100 dark:bg-gray-700 text-center"
   href="{{ route('admin.students.index', ['view' => 'trash']) }}">
   Trash ({{ $trashed }})
</a>
                </div>

                <!-- Search Form -->
                <form action="{{route('admin.students.index')}}" method="get" class="flex flex-col sm:flex-row items-center gap-2 w-full sm:w-auto">
                    <label for="search" class="sr-only">Search students</label>
                    <input type="text" name="search" id="search"
                        class="bg-white text-black rounded-xl px-3 py-1 w-full sm:w-64  border-2"
                        placeholder="Search...">
                    <x-ui.button class="w-full sm:w-auto" variant="outline">Search</x-ui.button>
                </form>
            </div>
        </div>

        <!-- Student Table -->
        <div class="overflow-x-auto">
            <x-table.table>
                <x-slot name="thead">
                    <tr>
                        <x-table.th>ID</x-table.th>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Student ID</x-table.th>
                        <x-table.th>Education</x-table.th>
                        <x-table.th>Mobile Number</x-table.th>
                        <x-table.th>Created</x-table.th>
                        <x-table.th>Action</x-table.th>
                    </tr>
                </x-slot>

                @forelse ($students as $student)
                    <tr>
                        <x-table.td>{{ $student->id }}</x-table.td>
                        <x-table.td>{{ $student->name }}</x-table.td>
                        <x-table.td>{{ $student->student_id }}</x-table.td>
                        <x-table.td class="capitalize">{{ $student->education }}</x-table.td>
                        <x-table.td>{{ $student->mobile_number }}</x-table.td>
                        <x-table.td>{{ $student->created_at->format('d M Y') }}</x-table.td>
                        <x-table.td>
    <x-dropdown-button label="Options">
        @if (request('view') === 'trash')
            <!-- Restore Option -->
            <form method="POST" action="{{ route('students.restore', $student->id) }}">
                @csrf
                <button type="submit"       
                    class="w-full text-left block px-4 py-2 text-sm text-green-600 dark:text-green-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Restore
                </button>
            </form>

            <!-- Permanent Delete Option -->
            <form method="POST" action="{{ route('students.forceDelete', $student->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full text-left block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Delete Permanently
                </button>
            </form>
        @else
            <!-- Edit Option -->
            <a href="{{ route('students.edit', $student->id) }}"
                class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                Edit
            </a>

            <!-- View Option -->
            <a href="{{ route('students.show', $student->id) }}"
                class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                View
            </a>

            <!-- Soft Delete / Trash Option -->
            <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full text-left block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Trash
                </button>
            </form>
        @endif
    </x-dropdown-button>
</x-table.td>

                    </tr>
                @empty
                    <tr>
                        <x-table.td colspan="7" class="text-center text-sm text-gray-500 dark:text-gray-400">
                            No students found.
                        </x-table.td>
                    </tr>
                @endforelse
            </x-table.table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</x-layouts.app>
