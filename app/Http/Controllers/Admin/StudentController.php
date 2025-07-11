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

          $students = Student::select('id','name','student_id','mobile_number','education','created_at')->orderByDesc(column: 'id')->paginate(config('skoolsys.paginate_page')??10);

         return view('admin.students.index', compact('students'));
    }
}
