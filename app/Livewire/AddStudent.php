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

    public function mount(Student $student = null)
    {
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
        ];
    }

    public function store()
    {
        $this->validate();

        $student = Student::create($this->getStudentData());

        if (!$student->student_id) {
            $year = Carbon::now()->year;
            $student->student_id = 'STU_' . $year . str_pad($student->id, 4, '0', STR_PAD_LEFT);
            $student->save();
        }

        session()->flash('success', "Student created with ID: {$student->student_id}");
        $this->resetForm();
        return redirect()->route(route: 'admin.students.index');
    }

    public function update()
    {
        $this->validate();

        $student = Student::findOrFail($this->student_id);
        $student->update($this->getStudentData());

        session()->flash('success', "Student updated successfully with ID.:{$student->student_id}");
        $this->resetForm();
        return redirect()->route('admin.students.index');
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
        return view('livewire.add-student');
    }
}
