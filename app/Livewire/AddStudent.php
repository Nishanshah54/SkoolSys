<?php

namespace App\Livewire;

use App\Models\Student;
use App\Services\ActivityLogger;
use Carbon\Carbon;
use Livewire\Component;

class AddStudent extends Component
{
    public $student_id;
    public $name;
    public $education;
    public $mobile_number;
    public $grade_id;
    public $section_id;
    public $grades;
    public $sections;


    public function mount(Student $student = null)
    {
        $this->grades = \App\Models\Grade::all();
        $this->sections = \App\Models\Section::all();

        if ($student) {
            $this->student_id = $student->id;
            $this->name = $student->name;
            $this->education = $student->education;
            $this->mobile_number = $student->mobile_number;
        }
    }

    public function getIsEditProperty()
    {
        return !is_null($this->student_id);
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'education' => 'required|in:primary,secondary,higher,bachelor',
        'mobile_number' => 'nullable|regex:/^[0-9]{10,15}$/',
        'grade_id' => 'required|exists:grades,id',
        'section_id' => 'required|exists:sections,id',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function getStudentData()
    {
        return [
        'name' => $this->name,
        'education' => $this->education,
        'mobile_number' => $this->mobile_number,
        'grade_id' => $this->grade_id,
        'section_id' => $this->section_id,
        ];
    }

 public function store()
{
    try {
        $this->validate();

        $student = Student::create($this->getStudentData());

        if (!$student->student_id) {
            $year = Carbon::now()->year;
            $student->student_id = 'STU_' . $year . str_pad($student->id, 4, '0', STR_PAD_LEFT);
            $student->save();
        }

        ActivityLogger::log("Added new student: {$student->name}", 'Student', $student->id, 'Info');

        session()->flash('success', "Student created with ID: {$student->student_id}");
        $this->resetForm();

        return redirect()->route('admin.students.index');
    } catch (\Exception $e) {
             // Optional: log activity as an error
        ActivityLogger::log("Failed to add new student", 'Student', null, 'Error');

        session()->flash('error', 'Something went wrong while creating the student.');
        return back()->withInput();
    }
}
    public function update()
{
    try {
        $this->validate();

        $student = Student::findOrFail($this->student_id);
        $student->update($this->getStudentData());

        ActivityLogger::log("Updated student: {$student->name}", 'Student', $student->id, 'Info');

        session()->flash('success', "Student updated successfully with ID: {$student->student_id}");
        $this->resetForm();

        return redirect()->route('admin.students.index');
    } catch (\Exception $e) {
        // Log the technical error for developers
        \Log::error('Student Update Error: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString(),
        ]);

        // Optionally log to activity table as an error
        ActivityLogger::log("Failed to update student", 'Student', $this->student_id, 'Error');

        session()->flash('error', 'Something went wrong while updating the student.');
        return back()->withInput();
    }
}


    public function submit()
    {
        $this->isEdit ? $this->update() : $this->store();
    }

    private function resetForm()
    {
        $this->reset(['student_id', 'name', 'education', 'mobile_number']);
    }

    public function render()
    {
        return view('livewire.add-student', [
        'grades' => $this->grades,
        'sections' => $this->sections,
    ]);
    }
}