<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Livewire\WithPagination;

class StudentController extends Controller
{
          use WithPagination;

    public function index()
    {
        $students = Student::select('id','name','student_id','mobile_number','education','created_at')->orderByDesc(column: 'id')->paginate(config('skoolsys.paginate_page') ??10);
         return view('admin.students.index', compact('students'));
    }

       public function store()
    {
        return view('admin.students.add-student');
    }

    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        $student->delete(); // Soft delete
        return back()->with('success', "Student trashed successfully with Student ID:{$student->student_id}");
    }
}
