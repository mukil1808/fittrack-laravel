<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Exercise;

class Workout extends Model
{
    protected $fillable = [
        'user_id',
        'workout_date',
        'duration',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'workout_exercises')
            ->withPivot('sets', 'reps')
            ->withTimestamps();
    }
}
