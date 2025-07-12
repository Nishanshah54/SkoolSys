<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="p-6 space-y-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">
            {{ __('Manage Students') }}
        </h1>

        @if (session()->has('success'))
            <div class="p-4 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-300 dark:border-green-700">
                {{ session('success') }}
            </div>
        @endif
          <!-- Add Student Form -->
        <div class=" flex bg-white dark:bg-[#0f0e0e] shadow rounded-lg p-6">
            <div class="flex flex-col gap-6 p-2 ">
                <h2 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-100">
                    {{ __('Add Students') }}
                </h2>
                <livewire:add-student />
            </div>
             <div class="flex flex-col gap-6 p-2 ">
            <h2 class="text-xl font-semibold text-gray-800 text-center dark:text-gray-100">
                {{ __('All Students') }}
            </h2>

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
                    </tr>
                </x-slot>

                @foreach ($students as $student)
                    <tr>
                        <x-table.td>{{ $student->id }}</x-table.td>
                        <x-table.td>{{ $student->name }}</x-table.td>
                        <x-table.td>{{ $student->student_id }}</x-table.td>
                        <x-table.td class="capitalize">{{ $student->education }}</x-table.td>
                        <x-table.td>{{ $student->mobile_number }}</x-table.td>
                        <x-table.td>{{ $student->created_at->format('d M Y') }}</x-table.td>
                    </tr>
                @endforeach
            </x-table.table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
        </div>




    </div>
</x-layouts.app>
