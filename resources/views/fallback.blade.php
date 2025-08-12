<x-layouts.guest.header>
    <main role="main" aria-labelledby="fallback-title" aria-describedby="fallback-desc" >
        <div class="max-w-lg w-full mx-auto text-center p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-xl dark:shadow-gray-900/50 backdrop-blur-sm border border-gray-200 dark:border-gray-700 transition-all hover:shadow-2xl hover:-translate-y-1">
            <!-- Animated emoji -->
            <div class="mb-8 text-8xl animate-bounce" aria-hidden="true">
                <span class="text-yellow-400 dark:text-yellow-300">⚠️</span>
            </div>

            <!-- Title with gradient text -->
            <h1 id="fallback-title" class="mb-4 text-4xl font-bold bg-gradient-to-r from-red-500 to-purple-600 dark:from-red-400 dark:to-purple-500 bg-clip-text text-transparent">
                Oops! Something went wrong.
            </h1>

            <!-- Description with improved readability -->
            <p id="fallback-desc" class="mb-8 text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                We're having trouble loading the page right now. Please check your connection or try again later.
            </p>

            <!-- Enhanced button with animation -->
            <a href="{{ url('/') }}"
               class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 dark:from-blue-600 dark:to-indigo-700 px-8 py-4 font-semibold text-white shadow-lg transition-all hover:shadow-xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                   <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
               </svg>
               Go back home
            </a>

            <!-- Optional additional help link -->
            <div class="mt-6 text-sm text-gray-500 dark:text-gray-400">
                Need help? <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Contact support</a>
            </div>
        </div>
    </main>
</x-layouts.guest.header>
