<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

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
