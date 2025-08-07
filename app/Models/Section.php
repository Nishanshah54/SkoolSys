<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     use HasFactory;
    protected $fillable = ['grade_id', 'name'];
    
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
