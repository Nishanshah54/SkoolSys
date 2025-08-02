<x-layouts.app :title="__('Timetable | Student')">
    {{-- Header / breadcrumb --}}
    <div class="mb-6 flex flex-col justify-between gap-4 rounded-xl border border-neutral-200 bg-white p-6
                dark:border-neutral-700 dark:bg-neutral-800 md:flex-row md:items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Today’s Timetable') }}
            </h1>
            <p class="text-gray-600 dark:text-gray-300">
                {{ now()->format('l, F jS Y') }}
            </p>
        </div>

        {{-- Quick links back to dashboard actions --}}
        <div class="flex gap-3">
            <a href="{{ route('student.assignments') }}"
               class="rounded-lg bg-purple-100 px-4 py-2 text-sm font-medium text-purple-700 hover:bg-purple-200
                      dark:bg-purple-900 dark:text-purple-100 dark:hover:bg-purple-800">
                {{ __('Pending Assignments') }}
            </a>
            <a href="{{ route('dashboard') }}"
               class="rounded-lg bg-neutral-100 px-4 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-200
                      dark:bg-neutral-700 dark:text-neutral-100 dark:hover:bg-neutral-600">
                {{ __('Back to Dashboard') }}
            </a>
        </div>
    </div>

    {{-- Timetable list --}}
    <div class="space-y-4">
         @forelse ($timetable as $slot)
            <div
                class="flex flex-col gap-1 rounded-lg p-4
                       @class([
                           'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' => $loop->odd,
                           'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' => $loop->even,
                       ])">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold">{{ $slot->start->format('g:i A') }} &mdash; {{ $slot->subject }}</h2>
                    <span class="text-sm opacity-80">{{ $slot->room }}</span>
                </div>
                <p class="text-sm opacity-80">{{ $slot->teacher }}</p>
            </div>
        @empty
            <p class="rounded-lg bg-yellow-50 p-4 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                {{ __('No classes scheduled for today.') }}
            </p>
        @endforelse 
    </div>
</x-layouts.app>
