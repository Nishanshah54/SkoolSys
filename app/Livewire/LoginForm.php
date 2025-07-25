<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
class LoginForm extends Component
{
 public string $role = '';
    public string $student_id = '';
    public string $mobile_number = '';
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

    // Defensive check (optional but safe)
    if (!Auth::check()) {
        throw ValidationException::withMessages([
            $this->getLoginFieldName() => __('Authentication succeeded, but user session was not established.'),
        ]);
    }

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
            'parent' => ['mobile_number' => 'required|string'],
            default => [],
        };

        return array_merge($common, $roleSpecific);
    }

    protected function credentials(): array
    {
        return match ($this->role) {
            'admin', 'teacher' => ['email' => $this->email, 'password' => $this->password],
            'student' => ['student_id' => $this->student_id, 'password' => $this->password],
            'parent' => ['mobile_number' => $this->mobile_number, 'password' => $this->password],
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
        return Str::transliterate(Str::lower($this->email ?: $this->mobile_number ?: $this->student_id) . '|' . request()->ip());
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
            'parent' => 'mobile_number',
            default => 'email',
        };
    }
};
