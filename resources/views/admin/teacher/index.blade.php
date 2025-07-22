<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="p-4 sm:p-6 space-y-6">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-stretch gap-4">
            <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                {{ __('Manage Teachers') }}
            </p>
            <a href="{{ route('admin.teacher.create') }}"
                class="sm:w-auto px-4 py-2 rounded-md text-sm font-medium  bg-black text-white hover:bg-gray-700 text-center border border-gray-300 ">
                {{ __('Add Teachers') }}
            </a>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))

            <div
                class="p-4 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-300 dark:border-green-700">
                @if (session()->has('success'))
                    <x-ui.alert variant="success" :title="__('Success')" :description="session('success')" />
                @endif

            </div>

        @endif

        <!-- Section Title -->
        <p class="text-xl font-semibold text-center text-gray-800 dark:text-gray-100">
            {{ __('All Teacher') }}
        </p>

        <!-- Filter and Search Controls -->
        <div class="mb-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 text-back dark:text-white">
                <!-- Filter Links -->
                <div class="flex justify-center sm:justify-start flex-wrap gap-2 text-sm">
                    <a class="px-3 py-1 rounded bg-gray-100 dark:bg-gray-700 text-center"
                        href="{{ route('admin.teacher.index') }}">All: ({{ $total }})</a>
                    <a class="px-3 py-1 rounded bg-gray-100 dark:bg-gray-700 text-center"
                        href="{{ route('admin.teacher.index', ['view' => 'trash']) }}">
                        Trash ({{ $trashed }})
                    </a>
                </div>

                <!-- Search Form -->
                <form action="{{ route('admin.teacher.index') }}" method="get"
                    class="flex flex-col sm:flex-row items-center gap-2 w-full sm:w-auto">
                    <label for="search" class="sr-only">Search Teacher</label>
                    <input type="text" name="search" id="search"
                        class="bg-white text-black rounded-xl px-3 py-1 w-full sm:w-64  border-2"
                        placeholder="Search...">
                    <x-ui.button class="w-full sm:w-auto" variant="outline">Search</x-ui.button>
                </form>
            </div>
        </div>

        <!-- teacher Table -->
        <div class="overflow-x-auto">
            <x-table.table>
                <x-slot name="thead">
                    <tr>
                        <x-table.th>ID</x-table.th>
                        <x-table.th>Name</x-table.th>
                        <x-table.th>Email</x-table.th>
                        <x-table.th>Phone</x-table.th>
                        <x-table.th>Gender</x-table.th>
                        <x-table.th>Address</x-table.th>
                        <x-table.th>Qualification</x-table.th>
                        <x-table.th>Specialization</x-table.th>
                        <x-table.th>action</x-table.th>
                    </tr>
                </x-slot>

                @forelse ($teachers as $teacher)
                    <tr>
                        <x-table.td>{{ $teacher->id }}</x-table.td>
                        <x-table.td>{{ $teacher->name }}</x-table.td>
                        <x-table.td>{{ $teacher->email }}</x-table.td>
                        <x-table.td>{{ $teacher->mobile_number }}</x-table.td>
                        <x-table.td>{{ $teacher->gender }}</x-table.td>
                        <x-table.td>{{ $teacher->address }}</x-table.td>
                        <x-table.td class="capitalize">{{ $teacher->qualification }}</x-table.td>
                        <x-table.td>{{ $teacher->specialization }}</x-table.td>
                        <x-table.td>
                            <x-dropdown-button label="Options">
                                @if (request('view') === 'trash')
                                    <!-- Restore Option -->
                                    <form method="POST" action="{{ route('teacher.restore', $teacher->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-left block px-4 py-2 text-sm text-green-600 dark:text-green-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Restore
                                        </button>
                                    </form>

                                    <!-- Permanent Delete Option -->
                                    <form method="POST" action="{{ route('teacher.forceDelete', $teacher->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full text-left block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Delete Permanently
                                        </button>
                                    </form>
                                @else
                                    <!-- Edit Option -->
                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Edit
                                    </a>

                                    <!-- View Option -->
                                    <a href="{{ route('admin.teacher.show', $teacher->id) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        View
                                    </a>

                                    <!-- Soft Delete / Trash Option -->
                                    <form method="POST" action="{{ route('admin.teacher.destroy', $teacher->id) }}">
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
                            No teacher found.
                        </x-table.td>
                    </tr>
                @endforelse
            </x-table.table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $teachers->links() }}
        </div>
    </div>
</x-layouts.app>
