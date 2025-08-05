<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
     use HasFactory;

    protected $fillable = ['name'];

    // A grade has many sections (e.g., A, B, C)
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    // A grade has many students directly (useful for filtering)
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // A grade can be taught by multiple teachers
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_grades');
    }

    // A grade has many timetable slots
    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
    public function schedules()
    {
    return $this->hasMany(Schedule::class);
    }
}
