<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $role = '';
    public string $name = '';
    public string $email = '';
    public string $student_id = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $baseRules = [
            'role' => ['required', 'in:admin,teacher,student,parent'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ];

        $roleSpecificRules = match ($this->role) {
            'admin', 'teacher' => [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            ],
            'student' => [
                'name' => ['required', 'string', 'max:255'],
                'student_id' => ['required', 'string', 'unique:' . User::class . ',student_id'],
            ],
            'parent' => [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'unique:' . User::class . ',phone'],
            ],
            default => [],
        };

        $validated = $this->validate([...$baseRules, ...$roleSpecificRules]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create([
            ...$validated,
            'role' => $this->role,
        ]);

        event(new Registered($user));
        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
    <!-- Role Selection -->
    <flux:select  wire:model="role"     :label="__('Register as')"        required
    >
        <option value="">{{ __('Select role') }}</option>
        <option value="admin">{{ __('Admin') }}</option>
        <option value="teacher">{{ __('Teacher') }}</option>
        <option value="student">{{ __('Student') }}</option>
        <option value="parent">{{ __('Parent') }}</option>
    </flux:select>

    <!-- Name (all roles) -->
    <flux:input
        wire:model="name"
        :label="__('Name')"
        type="text"
        required

            autofocus
            autocomplete="name"
            :placeholder="__('Full name')"
        />

    <!-- Email (Admin/Teacher only) -->
    @if(in_array($role, ['admin', 'teacher']))
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            placeholder="email@example.com"
        />
    @endif

    <!-- Student ID (Student only) -->
    @if($role === 'student')
        <flux:input
            wire:model="student_id"
            :label="__('Student ID')"
            type="text"
            required
            placeholder="e.g. S12345678"
        />
    @endif

    <!-- Phone Number (Parent only) -->
    @if($role === 'parent')
        <flux:input
            wire:model="phone"
            :label="__('Phone Number')"
            type="text"
            required
            placeholder="e.g. +1234567890"
        />
    @endif

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        <span>{{ __('Already have an account?') }}</span>
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
