<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
     use HasFactory;

    protected $fillable = ['name'];

    // A Grade has many Sections
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    // A Grade has many Students (assuming you're using a 'students' table)
    public function students()
    {
        return $this->hasMany(Student::class); // or User::class if students are in users table
    }

    // A Grade has many Timetables (if assigning timetable per grade)
    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}