<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="p-6 space-y-6">
        <p class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">
            {{ __('Manage Students') }}
        </p>
                <a href="{{route('students.add')}}" class="px-4 py-2 rounded-md text-sm font-medium bg-black  text-white hover:bg-gray-700">
                    {{ __('Add Students') }}
                </a>
            <div class="flex flex-col gap-6 p-2 ">
                     @if (session()->has('success'))
            <div
                class="p-4 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-300 dark:border-green-700">
                {{ session('success') }}
            </div>
        @endif
                <div>
                     <p class="text-xl font-semibold text-gray-800 text-center dark:text-gray-100">
                    {{ __('All Students') }}
                </div>

            </div>
        <div class="flex flex-col gap-6 p-2">
    {{-- Optional Search --}}
    {{-- <input wire:model.debounce.300ms="search" placeholder="Search..." class="..." /> --}}

    <!-- Student Table -->
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
                        <!-- Edit: Pass $student to route -->
                        <a href="{{ route('students.edit', $student->id) }}"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            Edit
                        </a>

                        <!-- View: Route can be added -->
                        <a href="{{ route('students.show',$student->id)}}"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            View
                        </a>

                        <!-- Soft Delete / Trash -->
                        <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full text-left block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                Trash
                            </button>
                        </form>
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

    <!-- Pagination -->
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>

        </div>




    </div>
</x-layouts.app>
