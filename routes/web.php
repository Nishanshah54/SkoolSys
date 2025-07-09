<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', function () {
     $user = Auth::user();

    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'teacher':
            return redirect()->route('teacher.dashboard');
        case 'student':
            return redirect()->route('student.dashboard');
        case 'parent':
            return redirect()->route('parent.dashboard');
        case 'account':
            // Add this if you have an account dashboard
            return redirect()->route('account.dashboard');
        default:
            abort(403, 'Unauthorized');
    }
})->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    Route::middleware(['role:teacher'])->group(function () {
        Route::get('/teacher/dashboard', function () {
            return view('teacher.dashboard');
        })->name('teacher.dashboard');
    });

    Route::middleware(['role:student'])->group(function () {
        Route::get('/student/dashboard', function () {
            return view('student.dashboard');
        })->name('student.dashboard');
    });

    Route::middleware(['role:parent'])->group(function () {
        Route::get('/parent/dashboard', function () {
            return view('parent.dashboard');
        })->name('parent.dashboard');
    });

});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';