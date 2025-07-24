<x-layouts.app :title="__('Dashboard | Course List')">
<div class="max-w-4xl mx-auto p-6 bg-white text-black dark:text-white dark:bg-[#0f101b] rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Course Management</h2>

    <a href="{{ route('courses.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">Add New Course</a>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border border-gray-300 dark:border-gray-700">
        <thead class="bg-gray-100 dark:bg-gray-800">
            <tr>
                <th class="px-4 py-2 text-left">Code</th>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Department</th>
                <th class="px-4 py-2 text-left">Credits</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr class="border-t dark:border-gray-700">
                <td class="px-4 py-2">{{ $course->code }}</td>
                <td class="px-4 py-2">{{ $course->name }}</td>
                <td class="px-4 py-2">{{ $course->department }}</td>
                <td class="px-4 py-2">{{ $course->credits }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('courses.show', $course) }}" class="text-blue-500 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layouts.app>
