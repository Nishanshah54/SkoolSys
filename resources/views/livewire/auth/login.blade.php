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

    public function login(): void
    {
        $this->validate($this->rules());

        $this->ensureIsNotRateLimited();

        if (!Auth::attempt($this->credentials(), $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                $this->getLoginFieldName() => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

    // Redirect to role-based dashboard
    $this->redirect(route($this->dashboardRouteName()), navigate: true);
}

protected function dashboardRouteName(): string
{
    return match ($this->role) {
        'admin' => 'admin.dashboard',
        'teacher' => 'teacher.dashboard',
        'student' => 'student.dashboard',
        'parent' => 'parent.dashboard',
        default => 'login', // fallback
    };
}

    protected function rules(): array
    {
        $common = [
            'role' => 'required|in:admin,teacher,student,parent',
            'password' => 'required|string',
        ];

        $roleSpecific = match ($this->role) {
            'admin', 'teacher' => ['email' => 'required|email'],
            'student' => ['student_id' => 'required|string'],
            'parent' => ['phone' => 'required|string'],
            default => [],
        };

        return array_merge($common, $roleSpecific);
    }

    protected function credentials(): array
    {
        $base = ['password' => $this->password, 'status' => [0, 1]];

        return match ($this->role) {
            'admin', 'teacher' => array_merge($base, ['email' => $this->email]),
            'student' => array_merge($base, ['student_id' => $this->student_id]),
            'parent' => array_merge($base, ['phone' => $this->phone]),
            default => [],
        };
    }


    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
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

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email ?: $this->phone ?: $this->student_id) . '|' . request()->ip());
    }

       public function mount(): void
    {
        $roleFromUrl = request()->query('role');

        if (in_array($roleFromUrl, ['admin', 'teacher', 'student', 'parent'])) {
            $this->role = $roleFromUrl;
        }
    }

    protected function getLoginFieldName(): string
    {
        return match ($this->role) {
            'admin', 'teacher' => 'email',
            'student' => 'student_id',
            'parent' => 'phone',
            default => 'email',
        };
    }
}; ?>


@include('livewire.login-form')
