<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory,SoftDeletes;
     protected $fillable = [
        'name',
        'education',
        'mobile_number',
        'student_id'

    ];
    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }

   // A student belongs to one grade
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    // A student belongs to one section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // A student may have multiple assigned teachers (e.g. for mentorship or subjects)
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'student_teacher');
    }

    // A student can be linked to multiple timetable entries (e.g. electives or sessions)
    public function timetables()
    {
        return $this->belongsToMany(Timetable::class, 'student_timetable');
    }


}
