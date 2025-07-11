<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" x-data="{ role: @entangle('role') }" class="flex flex-col gap-6">
        <!-- Role Selection -->
        <flux:select wire:model="role" :label="__('Login as')" required>
            <option value="">{{ __('Select role') }}</option>
            <option value="admin">{{ __('Admin') }}</option>
            <option value="teacher">{{ __('Teacher') }}</option>
            <option value="student">{{ __('Student') }}</option>
            <option value="parent">{{ __('Parent') }}</option>
        </flux:select>

        <!-- Email (Admin/Teacher) -->
        <template x-if="role === 'admin' || role === 'teacher'">
            <flux:input wire:model="email" :label="__('Email address')" type="email" required autofocus
                autocomplete="email" placeholder="email@example.com" />
        </template>

        <!-- Student ID -->
        <template x-if="role === 'student'">
            <flux:input wire:model="student_id" :label="__('Student ID')" type="text" required autofocus
                placeholder="e.g. S12345678" />
        </template>

        <!-- Phone Number -->
        <template x-if="role === 'parent'">
            <flux:input wire:model="phone" :label="__('Phone Number')" type="text" required autofocus
                placeholder="e.g. +1234567890" />
        </template>

        <!-- Password -->
        <div class="relative">
            <flux:input wire:model="password" :label="__('Password')" type="password" required
                autocomplete="current-password" :placeholder="__('Password')" viewable />
        </div>
        <div class="relative">

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
                <!-- Remember Me -->
            @endif
            <flux:checkbox wire:model="remember" :label="__('Remember me')" />
        </div>


        <!-- Submit Button -->
        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Log in') }}</flux:button>
        </div>
    </form>


    @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Don\'t have an account?') }}</span>
            <flux:link :href="route('register')" wire:navigate>{{ __('Sign up') }}</flux:link>
        </div>
    @endif
</div>
