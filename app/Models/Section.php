<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //

 // A section belongs to a grade
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    // A section has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // A section may have multiple timetable entries
    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }

}