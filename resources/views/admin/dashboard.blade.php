<x-layouts.app :title="__('Dashboard | Admin')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <!-- Header with Greeting and Search -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800 dark:text-white">SkoolSys Admin Dashboard</h1>
                <p class="text-gray-500 dark:text-gray-400">Welcome back, {{ Auth::user()->name }}!</p>
            </div>
            <div class="relative w-full sm:w-64">
                <input type="text" placeholder="Search..."
                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- Stats Cards with Growth Indicators -->
        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-4">
            @php $data=array_diff_assoc($count); @endphp

            <!-- Students Card -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <a href="{{ route('admin.students.index') }}" class="hover:text-green-400">Students</a>
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">+12%</span>
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">
                    <a href="{{ route('admin.students.index') }}"
                        class="hover:text-green-400">{{ $data['total_student'] }}</a>
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Total enrolled students</div>
            </div>

            <!-- Teachers Card -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-green-400">Teachers</a>
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">+5%</span>
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">
                    <a href="{{ route('admin.dashboard') }}"
                        class="hover:text-green-400">{{ $data['total_teacher'] }}</a>
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Teaching staff</div>
            </div>

            <!-- Parents Card -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <a href="#" class="hover:text-green-400">Parents</a>
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">+8%</span>
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">
                    <span>{{ $data['total_parent'] }}</span>
                </div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Registered parents</div>
            </div>

            <!-- Revenue Card -->
            <div
                class="relative flex flex-col justify-between aspect-video rounded-xl border border-neutral-200 bg-white p-4 dark:border-neutral-700 dark:bg-neutral-900 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 8.25H9m6 3H9m3 6-3-3h1.5a3 3 0 1 0 0-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Total Revenue
                    </div>
                    <span
                        class="text-xs px-2 py-1 rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">+22%</span>
                </div>
                <div class="mt-2 text-3xl text-center p-8 font-bold text-gray-900 dark:text-white">$128,900</div>
                <div class="text-xs text-gray-500 dark:text-gray-400">This fiscal year</div>
            </div>
        </div>

        <!-- Main Content Area -->
          @include('recentActivities.index');
    </div>
</x-layouts.app>
