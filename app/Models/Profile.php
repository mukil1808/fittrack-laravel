<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'age',
        'gender',
        'height',
        'weight',
        'fitness_level',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


