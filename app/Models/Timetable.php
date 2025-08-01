<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
     protected $fillable = [
        'teacher_id',
        'grade_id',
        'section_id',
        'day_of_week',
        'start_time',
        'end_time'
    ];

    // A timetable entry belongs to one teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // A timetable entry belongs to one grade
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    // A timetable entry belongs to one section (optional if not using per-section scheduling)
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // Many students can be linked to a timetable (e.g., electives or group sessions)
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_timetable');
    }
}
