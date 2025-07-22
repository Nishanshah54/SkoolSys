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

}
