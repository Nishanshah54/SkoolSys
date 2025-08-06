<x-layouts.app :title="__('Subjects')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">

        {{-- Cards / Stat Section --}}
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            {{-- Total Subjects Card --}}
            <div class="relative p-6 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 shadow-sm flex flex-col items-center justify-center">
                <div class="flex items-center gap-3">
                    <x-heroicon-s-book-open class="h-8 w-8 text-purple-500" />
                    <div class="text-center">
                        <div class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Subjects</div>
                        <div class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $subjects->total() }}</div>
                    </div>
                </div>
            </div>

            {{-- Active Subjects Card --}}
            <div class="relative p-6 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 shadow-sm flex flex-col items-center justify-center">
                <div class="flex items-center gap-3">
                    <x-heroicon-s-check-circle class="h-8 w-8 text-green-500" />
                    <div class="text-center">
                        <div class="text-sm font-medium text-gray-600 dark:text-gray-300">Active Subjects</div>
                        <div class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $subjects->count() }}</div>
                    </div>
                </div>
            </div>

            {{-- Add New Subject Card --}}
            <div class="relative p-6 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 shadow-sm flex items-center justify-center">
                <a href="{{ route('subjects.create') }}" class="w-full">
                    <x-ui.button variant="solid" class="w-full bg-purple-600 hover:bg-purple-700 text-white">
                        <div class="flex items-center justify-center">
                            <x-heroicon-s-plus class="w-5 h-5 mr-2" />
                            <span>Add New Subject</span>
                        </div>
                    </x-ui.button>
                </a>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 shadow-sm">
            <div class="p-4 border-b border-neutral-200 dark:border-neutral-700">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Subject List</h2>
            </div>

            <div class="p-4">
                @if ($subjects->count())
                    <x-table.table>
                        <x-slot name="thead">
                            <tr>
                                <x-table.th>ID</x-table.th>
                                <x-table.th>Name</x-table.th>
                                <x-table.th class="text-right">Actions</x-table.th>
                            </tr>
                        </x-slot>

                        @foreach ($subjects as $subject)
                            <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-700/50">
                                <x-table.td class="font-medium">{{ $subject->id }}</x-table.td>
                                <x-table.td>{{ $subject->name }}</x-table.td>
                                <x-table.td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('subjects.edit', $subject) }}" title="Edit">
                                            <x-ui.button size="sm" variant="outline" class="gap-1.5">
                                                <x-heroicon-s-pencil-square class="h-4 w-4" />
                                                <span class="sr-only sm:not-sr-only">Edit</span>
                                            </x-ui.button>
                                        </a>
                                        <form method="POST" action="{{ route('subjects.destroy', $subject) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this subject?')">
                                            @csrf
                                            @method('DELETE')
                                            <x-ui.button size="sm" variant="destructive" class="gap-1.5">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                                <span class="sr-only sm:not-sr-only">Delete</span>
                                            </x-ui.button>
                                        </form>
                                    </div>
                                </x-table.td>
                            </tr>
                        @endforeach
                    </x-table.table>
                @else
                    <div class="flex flex-col items-center justify-center gap-3 py-16 text-center text-gray-500 dark:text-gray-400">
                        <x-heroicon-o-inbox class="h-12 w-12" />
                        <p class="text-base font-medium">No subjects found</p>
                        <a href="{{ route('subjects.create') }}" class="mt-2 text-sm text-purple-600 hover:text-purple-700 dark:text-purple-400 dark:hover:text-purple-300 flex items-center gap-1">
                            <x-heroicon-s-plus class="h-4 w-4" />
                            Add your first subject
                        </a>
                    </div>
                @endif

                {{-- Pagination --}}
                @if ($subjects->hasPages())
                    <div class="mt-6 px-4 pb-4">
                        {{ $subjects->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
