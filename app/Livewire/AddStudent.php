<?php

namespace App\Livewire;

use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;

class AddStudent extends Component
{
    public $student_id;
    public $name;
    public $education;
    public $mobile_number;

    protected $rules=
    [
    'name' => 'required|string|max:255',
    'education' => 'required|in:primary,secondary,higher,bachelor',
    'mobile_number' => 'nullable|string|max:15',

    ];
    public function store()
    {
      $this->validate();

    // Create student WITHOUT student_id first, get the ID
    $student = Student::create([
        'name' => $this->name,
        'education' => $this->education,
        'mobile_number' => $this->mobile_number,
    ]);

    // Generate student_id like "STU_2025" + 4-digit zero-padded ID
    $year = Carbon::now()->year;
    $studentId = 'STU_' . $year . str_pad($student->id, 4, '0', STR_PAD_LEFT);

    // Save the student_id back
    $student->student_id = $studentId;
    $student->save();

    session()->flash('success', "Student created with ID: $studentId");

    $this->reset();
    }
    public function render()
    {
        return view('livewire.add-student');
    }
}