    <x-layouts.guest.header>
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] dark:bg-gray-700 hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login',['role' => 'admin']) }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC]  bg-[#1447a4] dark:bg-gray-700 hover:bg-[#0f188e] text-white border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC]  bg-[#1447a4] dark:bg-gray-700 hover:bg-[#0f188e] text-white border-[#19140035] hover:border-[#1915014a] border  dark:border-[#3E3E3A] dark:hover:border-[#748ba5] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div
                class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-[#0f3c8e] dark:bg-[#0f101b] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-es-lg rounded-ee-lg lg:rounded-ss-lg lg:rounded-ee-none">
                <!-- Icons Grid -->
                <div class="flex flex-col  items-center gap-2 p-2 rounded ">
                   
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-15 h-15">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                    </svg>
                    <h1 class="font-bold text-xl">School Portal</h1>
                    <h1>Select Your Role to login</h1>
                
                </div>
                <div class="grid grid-cols-2 gap-4">

                    <!-- Admin -->
                    <div
                        class="flex flex-col items-center gap-2 p-2 rounded bg-[#1447a4] dark:bg-gray-700 hover:bg-[#0f188e] dark:hover:bg-[#222220]">
                        <a href={{ route('login',['role' => 'admin']) }} class="flex flex-col items-center justify-center gap-1 text-white" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <span>Administration</span>
                    </a>
                    </div>

                    <!-- Teacher -->
                    <div
                        class="flex flex-col items-center gap-2 p-2 rounded bg-[#1447a4] dark:bg-gray-700 hover:bg-[#0f188e] dark:hover:bg-[#222220]">
                        <a href={{ route('login',['role' => 'teacher']) }} class="flex flex-col items-center justify-center gap-1 text-white" >
                      
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                        </svg>
                        <span>Teacher</span>
                    </a>
                    </div>

                    <!-- Students -->
                    <div
                        class="flex flex-col items-center gap-2 p-2 rounded bg-[#1447a4] dark:bg-gray-700 hover:bg-[#0f188e] dark:hover:bg-[#222220]">
                        <a href={{ route('login',['role' => 'student']) }} class="flex flex-col items-center justify-center gap-1 text-white" >
                      
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                        <span>Students</span>
                    </a>
                    </div>

                    <!-- Parents -->
                    <div
                        class="flex flex-col items-center gap-2 p-2 rounded bg-[#1447a4] dark:bg-gray-700 hover:bg-[#0f188e] dark:hover:bg-[#222220]">
                        <a href={{ route('login',['role' => 'parent']) }} class="flex flex-col items-center justify-center gap-1 text-white" >
                    
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18v-.75a6.75 6.75 0 0113.5 0V18M9 9.75a3 3 0 100-6 3 3 0 000 6zM15 12.75a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>
                        <span>Parents</span>
                    </a>
                    </div>

                    <!-- Accountant -->
                    <div
                        class="flex flex-col items-center gap-2 p-2 rounded bg-[#1447a4] dark:bg-gray-700 hover:bg-[#0f188e] dark:hover:bg-[#222220]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Accountant</span>
                    
                    </div>
                    <div
                        class="flex flex-col items-center gap-2 p-2 rounded bg-[#1447a4] dark:bg-gray-700 hover:bg-[#0f188e] dark:hover:bg-[#222220]">
                     
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3v18h18M7 13v5m4-9v9m4-13v13m4-6v6" />
                        </svg>

                        <span>Result</span>
                    </div>
                </div>
            </div>

           <div
    class="bg-[#fff2f2] dark:bg-gray-700 relative lg:-ms-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-e-lg! aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">

    {{-- Login Form --}}
    <div
        class="flex flex-col justify-center items-center m-4 py-5 px-5 text-black dark:text-white w-full h-full rounded-t-lg lg:rounded-t-none lg:rounded-e-lg ">
        
        <div class="w-3/4 max-w-md space-y-4">
            <form wire:submit="login" class="flex flex-col gap-6">
                <flux:input class="w-full" wire:model="email"
                    :label="__('Email address | Phone number | Student id')" type="email" required autofocus
                    autocomplete="email" placeholder="email@example.com" />
                <flux:input class="w-full" wire:model="password" :label="__('Password')" type="password"
                    required autocomplete="current-password" :placeholder="__('Password')" viewable />
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</flux:button>
            </form>
        </div>
    </div>
</div>

        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</x-layouts.guest.header>
