<?php

namespace App\Livewire;

use App\Services\ActivityLogger;
use Livewire\Component;
use App\Models\Teacher;

class AddTeacher extends Component
{
   public $isEdit = false;

    public $teacherId;
    public $name, $email, $mobile_number, $gender, $dob, $address, $qualification, $specialization;

public function mount($id = null)
{
    if ($id) {
        $this->isEdit = true;
        $teacher = Teacher::findOrFail($id);

        $this->teacherId = $teacher->id;
        $this->name = $teacher->name;
        $this->email = $teacher->email;
        $this->mobile_number = $teacher->mobile_number;
        $this->gender = $teacher->gender;
        $this->dob = $teacher->dob;
        $this->address = $teacher->address;
        $this->qualification = $teacher->qualification;
        $this->specialization = $teacher->specialization;
    }
}


    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'mobile_number' => 'required|string',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required|string',
            'qualification' => 'required',
            'specialization' => 'required|string',
        ]);

      $teacher=  Teacher::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'address' => $this->address,
            'qualification' => $this->qualification,
            'specialization' => $this->specialization,
        ]);
         ActivityLogger::log("Added new Teacher: {$teacher->name}", 'Teacher', $teacher->id,"Info");


        session()->flash('success', 'Teacher added successfully!');

       return redirect()->route(route: 'admin.teacher.index');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:teachers,email,{$this->teacherId}",
            'mobile_number' => 'required|string',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required|string',
            'qualification' => 'required',
            'specialization' => 'required|string',
        ]);

        $teacher = Teacher::findOrFail($this->teacherId);
        $teacher->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'address' => $this->address,
            'qualification' => $this->qualification,
            'specialization' => $this->specialization,
        ]);

        // ActivityLogger::log(action: "Update Teacher: {$teacher->name}", 'teacher', $teacher->id,"info");
 ActivityLogger::log("Update Teacher: {$teacher->name}", 'Teacher', $teacher->id,"Info");

        session()->flash('success', 'Teacher updated successfully!');
         return redirect()->route(route: 'admin.teacher.index');
    }

    public function render()
    {
        return view('livewire.add-teacher');
    }
}