<x-layouts.app :title="__('Dashboard | Add Schedule')">
    @if (session()->has('success'))
        <div
            class="p-4 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-300 dark:border-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col bg-white dark:bg-[#0f0e0e] shadow rounded-lg p-6">
        <div class="flex gap-6 p-2">
            <div>
                <a href="{{ route('schedules.index') }}"
                    class="px-4 py-2 text-left rounded-md text-sm font-medium border border-gray-300 text-gray-700 bg-white hover:bg-gray-50">
                    Back to Schedules
                </a>
            </div>

            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                {{ __('Add Schedule') }}
            </h2>
        </div>

        <div class="flex justify-center px-4 py-6">
            <div class="w-full max-w-md bg-white dark:bg-[#0a0a0a] border border-gray-200 dark:border-gray-700 rounded-xl p-4 sm:p-6">
         <form method="POST"
      action="{{ isset($schedule) ? route('schedules.update', $schedule->id) : route('schedules.store') }}"
      class="space-y-4">

    @csrf
    @if(isset($schedule))
        @method('PUT')
    @endif

    {{-- Grade --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Grade</label>
        <select name="grade_id" required
            class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100">
            <option value="">Select Grade</option>
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}"
                    {{ old('grade_id', $schedule->grade_id ?? '') == $grade->id ? 'selected' : '' }}>
                    {{ $grade->name }}
                </option>
            @endforeach
        </select>
        @error('grade_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Subject --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
        <select name="subject_id" required
            class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100">
            <option value="">Select Subject</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}"
                    {{ old('subject_id', $schedule->subject_id ?? '') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
        @error('subject_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Teacher --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teacher</label>
        <select name="teacher_id" required
            class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100">
            <option value="">Select Teacher</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}"
                    {{ old('teacher_id', $schedule->teacher_id ?? '') == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
        @error('teacher_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Day of Week --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Day of Week</label>
        <select name="day_of_week" required
            class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100">
            <option value="">Select Day</option>
            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                <option value="{{ $day }}"
                    {{ old('day_of_week', $schedule->day_of_week ?? '') == $day ? 'selected' : '' }}>
                    {{ $day }}
                </option>
            @endforeach
        </select>
        @error('day_of_week')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Start Time --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time</label>
        <input name="start_time" type="time" required
            value="{{ old('start_time', $schedule->start_time ?? '') }}"
            class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100" />
        @error('start_time')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- End Time --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Time</label>
        <input name="end_time" type="time" required
            value="{{ old('end_time', $schedule->end_time ?? '') }}"
            class="mt-1 w-full px-3 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-sm text-gray-800 dark:text-gray-100" />
        @error('end_time')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror

        {{-- Custom validation errors --}}
        @error('time')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror

        @error('conflict')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Submit Button --}}
    <div class="text-center">
        <button type="submit"
            class="px-4 py-2 text-sm font-medium bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 border border-gray-300 dark:border-gray-700 rounded-md hover:opacity-90 transition">
            {{ isset($schedule) ? 'Update Schedule' : 'Add Schedule' }}
        </button>
    </div>
</form>

            </div>
        </div>
    </div>
</x-layouts.app>
