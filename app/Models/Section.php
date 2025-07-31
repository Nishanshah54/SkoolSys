<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //

    public function teachers()
{
    return $this->hasMany(User::class)->where('role', 'teacher');
}
}
