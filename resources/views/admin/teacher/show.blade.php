<x-layouts.app :title="__('Dashboard | View Teacher Details')">
    <div class="max-w-3xl mx-auto p-6 bg-white text-black dark:text-white dark:bg-[#0f101b] rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Teacher Details</h2>

        <x-table.table>
            <x-slot name="thead">
                <tr>
                    <x-table.th>Field</x-table.th>
                    <x-table.th>Value</x-table.th>
                </tr>
            </x-slot>

            <tr>
                <x-table.td>ID</x-table.td>
                <x-table.td>{{ $teacher->id }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Name</x-table.td>
                <x-table.td>{{ $teacher->name }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Email</x-table.td>
                <x-table.td>{{ $teacher->email }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Phone</x-table.td>
                <x-table.td>{{ $teacher->mobile_number }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Gender</x-table.td>
                <x-table.td>{{ ucfirst($teacher->gender) }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Date of Birth</x-table.td>
                <x-table.td>{{ $teacher->dob  ?? 'N/A' }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Address</x-table.td>
                <x-table.td>{{ $teacher->address }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Qualification</x-table.td>
                <x-table.td class="capitalize">{{ $teacher->qualification }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Specialization</x-table.td>
                <x-table.td>{{ $teacher->specialization }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Created At</x-table.td>
                <x-table.td>{{ $teacher->created_at }}</x-table.td>
            </tr>
            <tr>
                <x-table.td>Updated At</x-table.td>
                <x-table.td>{{ $teacher->updated_at }}</x-table.td>
            </tr>
        </x-table.table>

        <div class="mt-6 flex justify-between text-center">
            <a href="{{ route('admin.teacher.index') }}"
               class="inline-block text-sm text-black dark:text-white hover:underline">
                ← Back to Teacher List
            </a>
            <a href="{{ route('admin.teacher.create') }}"
               class="text-sm text-black dark:text-white hover:underline">
                + Add Teacher
            </a>
        </div>
    </div>
</x-layouts.app>
