<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'actor_type',
        'action',
        'target_type',
        'target_id',
        'status',
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}