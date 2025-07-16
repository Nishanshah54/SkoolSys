<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Teacher;

class AddTeacher extends Component
{
   public $isEdit = false;

    public $teacherId;
    public $name, $email, $phone, $gender, $dob, $address, $qualification, $specialization;

public function mount($id = null)
{
    if ($id) {
        $this->isEdit = true;
        $teacher = Teacher::findOrFail($id);

        $this->teacherId = $teacher->id;
        $this->name = $teacher->name;
        $this->email = $teacher->email;
        $this->phone = $teacher->phone;
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
            'phone' => 'required|string',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required|string',
            'qualification' => 'required',
            'specialization' => 'required|string',
        ]);

        Teacher::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'address' => $this->address,
            'qualification' => $this->qualification,
            'specialization' => $this->specialization,
        ]);

        session()->flash('success', 'Teacher added successfully!');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:teachers,email,{$this->teacherId}",
            'phone' => 'required|string',
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
            'phone' => $this->phone,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'address' => $this->address,
            'qualification' => $this->qualification,
            'specialization' => $this->specialization,
        ]);

        session()->flash('success', 'Teacher updated successfully!');
    }

    public function render()
    {
        return view('livewire.add-teacher');
    }
}