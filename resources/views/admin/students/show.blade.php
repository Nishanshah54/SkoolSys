<x-layouts.app :title="__('Dashboard | View Details')">
<div class="max-w-3xl mx-auto p-6 bg-white text-black dark:text-white dark:bg-[#0f101b] rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Student Details</h2>

    <x-table.table>
        <x-slot name="thead">
            <tr>
                <x-table.th>Field</x-table.th>
                <x-table.th>Value</x-table.th>
            </tr>
        </x-slot>

        <tr>
            <x-table.td>ID</x-table.td>
            <x-table.td>{{ $student->id }}</x-table.td>
        </tr>
        <tr>
            <x-table.td>Name</x-table.td>
            <x-table.td>{{ $student->name }}</x-table.td>
        </tr>
        <tr>
            <x-table.td>Student ID</x-table.td>
            <x-table.td>{{ $student->student_id }}</x-table.td>
        </tr>
        <tr>
            <x-table.td>Education</x-table.td>
            <x-table.td class="capitalize">{{ $student->education }}</x-table.td>
        </tr>
        <tr>
            <x-table.td>Mobile Number</x-table.td>
            <x-table.td>{{ $student->mobile_number }}</x-table.td>
        </tr>
        <tr>
            <x-table.td>Created At</x-table.td>
            <x-table.td>{{ $student->created_at->format('d M Y') }}</x-table.td>
        </tr>
        <tr>
            <x-table.td>Update At</x-table.td>
            <x-table.td>{{ $student->updated_at->format('d M Y') }}</x-table.td>
        </tr>
        <tr>
            <x-table.td>Grade</x-table.td>
            <x-table.td>{{ $student->grade->name ?? 'N/A' }}</x-table.td>
        </tr>
        <tr>
            <x-table.td>Section</x-table.td>
            <x-table.td>{{ $student->section->name ?? 'N/A' }}</x-table.td>
        </tr>
    </x-table.table>

    <div class="mt-6 flex  justify-between text-center">
        <a href="{{ route('admin.students.index') }}"
           class="inline-block text-sm text-black dark:text-white hover:underline">
            ← Back to Student List
        </a>
        <a href="{{ route('students.add') }}"
           class=" text-sm text-black dark:text-white hover:underline ">
            + Add Student
        </a>

    </div>
</div>

</x-layouts.app>
