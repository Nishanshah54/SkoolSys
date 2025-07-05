<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|in:admin,teacher,student,parent')]
    public string $role = '';
    public string $student_id = '';
    public string $phone = '';    
    public string $email = '';
 
    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate(array_merge([
        'role' => 'required|in:admin,teacher,student,parent',
        'password' => 'required|string',
    ], match ($this->role) {
        'admin', 'teacher' => ['email' => 'required|email'],
        'student' => ['student_id' => 'required|string'],
        'parent' => ['phone' => 'required|string'],
        default => [],
    }));

        $this->ensureIsNotRateLimited();

            $credentials = match ($this->role) {
            'admin', 'teacher' => ['email' => $this->email, 'password' => $this->password],
            'student' => ['student_id' => $this->student_id, 'password' => $this->password],
            'parent' => ['phone' => $this->phone, 'password' => $this->password],
            default => [],
        };

          if (! Auth::attempt($credentials, $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                $this->getLoginFieldName() => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
    <!-- Role Selection -->
    <flux:select
        wire:model="role"
        :label="__('Login as')"
        required
    >
        <option value="">{{ __('Select role') }}</option>
        <option value="admin">{{ __('Admin') }}</option>
        <option value="teacher">{{ __('Teacher') }}</option>
        <option value="student">{{ __('Student') }}</option>
        <option value="parent">{{ __('Parent') }}</option>
    </flux:select>

    <!-- Email (Admin/Teacher) -->
    @if(in_array($role, ['admin', 'teacher']))
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"
        />
    @endif

    <!-- Student ID -->
    @if($role === 'student')
        <flux:input
            wire:model="student_id"
            :label="__('Student ID')"
            type="text"
            required
            autofocus
            placeholder="e.g. S12345678"
        />
    @endif

    <!-- Phone Number -->
    @if($role === 'parent')
        <flux:input
            wire:model="phone"
            :label="__('Phone Number')"
            type="text"
            required
            autofocus
            placeholder="e.g. +1234567890"
        />
    @endif

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Password')"
                viewable
            />

            @if (Route::has('password.request'))
                <flux:link class="absolute end-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox wire:model="remember" :label="__('Remember me')" />

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
