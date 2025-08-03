<x-layouts.app :title="__('Dashboard | View Details')">
           @if (session()->has('success'))
            <div
                class="p-4 rounded bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-300 dark:border-green-700">
                {{ session('success') }}
            </div>
        @endif
        <!-- Add Student Form -->
        <div class=" flex flex-col bg-white dark:bg-[#0f0e0e] shadow rounded-lg p-6">

                 <div class="flex gap-6 p-2 ">
                    <div>
                         <a href="{{route('admin.teacher.index')}}" class="px-4 py-2  text-left rounded-md text-sm font-medium border border-gray-300 text-gray-700 bg-white hover:bg-gray-50">Back to </a>
                    </div>

                <h2 class="text-xl font-semibold  text-gray-800 dark:text-gray-100">
                    {{ __('Add Teachers') }}
                </h2>
            </div>
            <div class="flex flex-col gap-6 p-2 w">
                <livewire:add-teacher/>
            </div>
</x-layouts.app>
