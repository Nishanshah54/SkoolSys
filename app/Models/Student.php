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

}