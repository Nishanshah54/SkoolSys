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
    public string $mobile_number = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
public function register(): void
{
    $base_rules = [
        'role' => ['required', 'in:account,teacher,student,parent'],
        'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
    ];

    $role_specific_rules = match ($this->role) {
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
            'mobile_number' => ['required', 'string', 'unique:' . User::class . ',mobile_number'],
        ],
        default => [],
    };

    $validated = $this->validate([...$base_rules, ...$role_specific_rules]);
    $validated['password'] = Hash::make($validated['password']);

    try {
        $user = User::create([...$validated, 'role' => $this->role]);

        event(new Registered($user));
        Auth::login($user);

        $this->redirectIntended(route('dashboard', false), true);

    } catch (\Illuminate\Database\QueryException $e) {
        // MySQL error 1452 = foreign key constraint fails
        if ($e->errorInfo[1] == 1452) {
            if ($this->role === 'student') {
                $this->addError('student_id', 'Your student ID was not found. Please contact the administrator to be added first.');
            } elseif ($this->role === 'parent') {
                $this->addError('mobile_number', 'Your mobile number was not found. A student must be registered first by the admin using this number.');
            } else {
                $this->addError('register', 'Registration failed due to a data link issue. Please contact support.');
            }   } else {
            // Other database error
            report($e);
            $this->addError('register', 'Registration failed due to a database error.');
        }

    } catch (\Exception $e) {
        report($e);
        $this->addError('register', 'An unexpected error occurred during registration.');
    }
}

}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" x-data="{ role: @entangle('role') }" class="flex flex-col gap-6">
        <!-- Role Selection -->
        <flux:select wire:model="role" :label="__('Register as')" required>
            <option value="">{{ __('Select role') }}</option>
            {{-- <option value="admin">{{ __('Admin') }}</option> --}}
            <option value="teacher">{{ __('Teacher') }}</option>
            <option value="student">{{ __('Student') }}</option>
            <option value="parent">{{ __('Parent') }}</option>
        </flux:select>

        <!-- Name (All roles) -->
        <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name"
            :placeholder="__('Full name')" />

        <!-- Email (Admin/Teacher only) -->
        <template x-if="role === 'admin' || role === 'teacher'">
            <flux:input wire:model="email" :label="__('Email address')" type="email" required
                placeholder="email@example.com" />
        </template>

        <!-- Student ID (Student only) -->
        <template x-if="role === 'student'">
            <flux:input wire:model="student_id" :label="__('Student ID')" type="text" required
                placeholder="e.g. S12345678" />
        </template>

        <!-- mobile_number Number (Parent only) -->
        <template x-if="role === 'parent'">
            <flux:input wire:model="mobile_number" :label="__('Mobile Number')" type="text" required
                placeholder="e.g. +1234567890" />
        </template>

        <!-- Password -->
        <flux:input wire:model="password" :label="__('Password')" type="password" required autocomplete="new-password"
            :placeholder="__('Password')" viewable />

        <!-- Confirm Password -->
        <flux:input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
            autocomplete="new-password" :placeholder="__('Confirm password')" viewable />

        <!-- Submit Button -->
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
