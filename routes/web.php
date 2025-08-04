<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentIndividualController;
use App\Http\Controllers\SubjectController;
use App\Livewire\AddStudent;
use App\Livewire\AddTeacher;
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

    Route::middleware(['role:admin','check.status'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/students',  [StudentController::class, 'index'])->name('admin.students.index');
        Route::get('/students/add', [StudentController::class,'store'])->name( 'students.add');
        Route::get('/students/edit/{student}', AddStudent::class)->name('students.edit');
        Route::get('/students/view/{student}', [StudentController::class, 'show'])->name('students.show');
        Route::delete('/students/{student}',  [StudentController::class, 'destroy'])->name('students.destroy');
        Route::post('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
        Route::delete('/students/{id}/force-delete', [StudentController::class, 'forceDelete'])->name('students.forceDelete');

       Route::get('/teacher/edit/{id}', AddTeacher::class)->name('teacher.edit');
        Route::resource('/admin/teacher',TeacherController::class)->names('admin.teacher');
        Route::post('teacher/{id}/restore', [TeacherController::class, 'restore'])->name('teacher.restore');
        Route::delete('teacher/{id}/force-delete', [TeacherController::class, 'forceDelete'])->name('teacher.forceDelete');
        Route::resource( 'courses', CourseController::class)->names('courses');
        Route::resource('subjects', SubjectController::class)->names('subjects');

    });

    Route::middleware(['role:teacher','check.status'])->group(function () {
        Route::get('/teacher/dashboard', function () {
            return view('teacher.dashboard');
        })->name('teacher.dashboard');
    });

    Route::middleware(['role:student','check.status'])->group(function () {
        Route::get('/student/dashboard', function () {
            return view('student.dashboard');
        })->name('student.dashboard');

        Route::get('student/profile',[StudentController::class.'profile'])->name('student.profile');
        Route::get('student/timetable',[StudentIndividualController::class,'timetable'])->name('student.timetable');
        Route::get('student/updates',[StudentController::class.'updates'])->name('student.updates');
        Route::get('student/result',[StudentController::class.'result'])->name('student.results');
        Route::get('student/assignments',[StudentController::class.'assignments'])->name('student.assignments');
        Route::get('student/assignments/show',[StudentController::class.'show'])->name('student.assignment.show');
    });

    Route::middleware(['role:parent','check.status'])->group(function () {
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

require __DIR__ . '/auth.php';