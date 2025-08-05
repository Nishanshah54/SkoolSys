<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
      use HasFactory;
    protected $fillable = [
    'grade_id',
    'teacher_id',
    'subject_id',
    'day_of_week',
    'start_time',
    'end_time',
];
    public function grade() {

    return $this->belongsTo(Grade::class);
    }
    public function subject() {
    return $this->belongsTo(Subject::class);
}

public function teacher() {
    return $this->belongsTo(Teacher::class);
}
}