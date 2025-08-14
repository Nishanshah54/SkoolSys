<!-- Practice Tests Section -->
<div class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 bg-white shadow-lg transition-all hover:shadow-xl dark:border-neutral-700 dark:bg-neutral-800 dark:hover:shadow-neutral-700/30 mt-6">
    <div class="p-6">
        <!-- Header with icon and title -->
        <div class="flex items-center mb-6">
            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-purple-100 dark:bg-purple-900/50 mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Practice Tests</h2>
        </div>

        <!-- Navigation Tabs -->
        <div class="flex gap-2 mb-8 overflow-x-auto pb-2">
            <button data-test="listening" class="test-tab flex items-center px-5 py-3 rounded-lg bg-purple-600 text-white hover:bg-purple-700 transition-colors shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.536a5 5 0 001.414 1.414m2.828-9.9a9 9 0 011.414 1.414" />
                </svg>
                Listening
            </button>
            <button data-test="speaking" class="test-tab flex items-center px-5 py-3 rounded-lg bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-neutral-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                </svg>
                Speaking
            </button>
            <button data-test="writing" class="test-tab flex items-center px-5 py-3 rounded-lg bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-neutral-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Writing
            </button>
            <button data-test="mock" class="test-tab flex items-center px-5 py-3 rounded-lg bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-neutral-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Mock Test
            </button>
        </div>

        <!-- Content Sections -->
        <div class="space-y-6">
            <!-- Listening Content -->
            <div id="listening-section" class="test-section space-y-6">
                <div class="bg-purple-50 dark:bg-purple-900/20 rounded-xl p-5">
                    <h3 class="text-lg font-semibold text-purple-800 dark:text-purple-200 mb-3">Listen and Type</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Play the audio and type what you hear in the box below.</p>

                    <div class="flex flex-col items-center gap-4">
                        <button id="playBtn" class="flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg shadow-md transition-all transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.536a5 5 0 001.414 1.414m2.828-9.9a9 9 0 011.414 1.414" />
                            </svg>
                            Play Audio
                        </button>

                        <div class="w-full max-w-md">
                            <label for="guess" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Type what you heard:</label>
                            <input type="text" id="guess" placeholder="Enter the text here..."
                                class="px-4 py-3 border rounded-lg w-full text-gray-800 dark:text-gray-200 dark:bg-neutral-700 border-neutral-300 dark:border-neutral-600 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" />
                        </div>

                        <button id="checkBtn" class="flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-md transition-all transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Check Answer
                        </button>

                        <div id="result" class="mt-2 p-4 rounded-lg w-full max-w-md text-center text-lg font-medium hidden"></div>
                    </div>
                </div>
            </div>

            <!-- Speaking Content -->
            <div id="speaking-section" class="test-section hidden">
                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-5">
                    <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-200 mb-3">Speaking Practice</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Record your response to the prompt below. You'll have 45 seconds to prepare and 60 seconds to speak.</p>

                    <div class="bg-white dark:bg-neutral-700 rounded-lg p-4 shadow-inner">
                        <p class="text-gray-800 dark:text-gray-200 font-medium">Describe a memorable trip you've taken. Include where you went, who you went with, and why it was memorable.</p>
                    </div>

                    <div class="mt-6 flex justify-center gap-4">
                        <button class="flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                            </svg>
                            Start Recording
                        </button>
                        <button class="flex items-center px-5 py-2.5 bg-gray-200 hover:bg-gray-300 dark:bg-neutral-600 dark:hover:bg-neutral-500 text-gray-800 dark:text-gray-200 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                            Sample Response
                        </button>
                    </div>
                </div>
            </div>

            <!-- Writing Content -->
            <div id="writing-section" class="test-section hidden">
                <div class="bg-amber-50 dark:bg-amber-900/20 rounded-xl p-5">
                    <h3 class="text-lg font-semibold text-amber-800 dark:text-amber-200 mb-3">Writing Task</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Write your response to the prompt below. Aim for at least 250 words.</p>

                    <div class="bg-white dark:bg-neutral-700 rounded-lg p-4 shadow-inner mb-4">
                        <p class="text-gray-800 dark:text-gray-200 font-medium">Some people believe that university education should be free for all students. Others argue that students should pay for their own education. Discuss both views and give your opinion.</p>
                    </div>

                    <textarea class="w-full h-64 px-4 py-3 border rounded-lg text-gray-800 dark:text-gray-200 dark:bg-neutral-700 border-neutral-300 dark:border-neutral-600 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all" placeholder="Type your essay here..."></textarea>

                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-gray-500 dark:text-gray-400">Word count: 0</span>
                        <button class="flex items-center px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                            </svg>
                            Submit Essay
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mock Test Content -->
            <div id="mock-section" class="test-section hidden">
                <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-xl p-5">
                    <h3 class="text-lg font-semibold text-emerald-800 dark:text-emerald-200 mb-3">Full Mock Test</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">Simulate the complete test experience with timed sections and realistic questions.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white dark:bg-neutral-700 rounded-lg p-5 shadow border border-gray-100 dark:border-neutral-600">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                    </svg>
                                </div>
                                <h4 class="font-medium text-gray-800 dark:text-gray-200">Listening</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">Approximately 30 minutes</p>
                            <button class="w-full py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm rounded-lg">Start Section</button>
                        </div>

                        <div class="bg-white dark:bg-neutral-700 rounded-lg p-5 shadow border border-gray-100 dark:border-neutral-600">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                <h4 class="font-medium text-gray-800 dark:text-gray-200">Reading</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">60 minutes</p>
                            <button class="w-full py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm rounded-lg">Start Section</button>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg shadow-md font-medium">
                            Start Full Test (All Sections)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Progress indicator (example for mock test) -->
<div class="hidden fixed bottom-6 right-6 bg-white dark:bg-neutral-800 shadow-xl rounded-lg p-4 border border-gray-200 dark:border-neutral-700">
    <div class="flex items-center">
        <div class="mr-3">
            <div class="w-12 h-12 rounded-full flex items-center justify-center bg-emerald-100 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <div>
            <p class="font-medium text-gray-800 dark:text-gray-200">Time Remaining</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">24:36</p>
        </div>
    </div>
</div>
