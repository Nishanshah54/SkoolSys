<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\Techer\TecherFactory> */
    use HasFactory,SoftDeletes;

     protected $fillable = [
        'email',
        'name',
        'gender',
        'dob',
        'address',
        'qualification',
        'mobile_number',
        'specialization'
        ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
      // A teacher can teach multiple grades
    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'teacher_grades');
    }

    // A teacher has many timetable entries (their teaching schedule)
    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }

    // A teacher may be assigned to many students (if applicable)
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_teacher');
    }

}