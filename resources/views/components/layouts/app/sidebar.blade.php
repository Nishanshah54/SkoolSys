<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />
        @if (auth()->check() && auth()->user()->email && auth()->user()->role === 'admin')
            <flux:navlist variant="outline">
                <!-- Group: Academics -->
                <x-sidebar-dropdown title="Academics" :index="1">
                    <flux:navlist.item icon="users" href="{{route('admin.students.index')}}">
                        {{ __('Manage Students') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="academic-cap" href="{{route('admin.teacher.index')}}">
                        {{ __('Manage Teachers') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="book-open-text" href="{{route('courses.index')}}">
                        {{ __('Manage Courses') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="calendar-date-range" href="/admin/schedule">
                        {{ __('Class Schedule') }}
                    </flux:navlist.item>
                </x-sidebar-dropdown>

                <!-- Group: Administration -->
                <x-sidebar-dropdown title="Administration" :index="2">
                    <flux:navlist.item icon="adjustments-horizontal" href="/admin/settings">
                        {{ __('System Settings') }}
                    </flux:navlist.item>

                    <flux:navlist.item icon="lock-closed" href="/admin/roles-permissions">
                        {{ __('Roles & Permissions') }}
                    </flux:navlist.item>
                </x-sidebar-dropdown>
                <x-sidebar-dropdown title="Reports and Analytics" :index="3">
                    <flux:navlist.item icon="arrow-trending-up" href="/admin/reports">
                        {{ __('Reports & Analytics') }}
                    </flux:navlist.item>
                </x-sidebar-dropdown>

            </flux:navlist>
        @endif
            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                @php
                                    $user = auth()->user();
                                    $secondaryInfo = $user->email ?? ($user->mobile_number ?? $user->student_id);
                                @endphp

                                @if ($secondaryInfo)
                                    <span class="truncate text-xs">{{ $secondaryInfo }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                @php
                                    $user = auth()->user();
                                    $secondaryInfo = $user->email ?? ($user->mobile_number ?? $user->student_id);
                                @endphp

                                @if ($secondaryInfo)
                                    <span class="truncate text-xs">{{ $secondaryInfo }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
