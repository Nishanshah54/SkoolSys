<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class StudentController extends Controller
{
    use WithPagination;

    public function index(Request $request)
    {
        $view = $request->input('view');

        $search = $request->input('search');

        if ($view === 'trash') {
            $query = Student::onlyTrashed();
        } else {
            $query = Student::query()->whereNull('deleted_at');
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('student_id', 'like', "%{$search}%")
                    ->orWhere('education', 'like', "%{$search}%")
                    ->orWhere('mobile_number', 'like', "%{$search}%");
            });
        }

        $students = $query->latest()->paginate(config("skoolsys.paginate_page") ?? 5);

        $total = Student::count();
        $trashed = Student::onlyTrashed()->count();


        return view('admin.students.index', compact('students', 'total', 'trashed'));
    }


    public function store()
    {
        return view('admin.students.add-student');
    }

    public function show(Student $student)
    {
        $students = Student::whereNull('deleted_at')->paginate(10);
        return view('admin.students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        $student->delete(); // Soft delete
        return back()->with('success', "Student trashed successfully with Student ID:{$student->student_id}");
    }
    public function restore($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->restore();

        return back()->with('success', 'Student restored successfully ID :' . $id);
    }

    public function forceDelete($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->forceDelete();

        return back()->with('success', 'Student permanently deleted ID :' . $id);
    }
}
