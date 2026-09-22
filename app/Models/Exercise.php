<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workout;

class Exercise extends Model
{
    protected $fillable = [
        'name',
        'description',
        'muscle_group',
        'difficulty',
    ];
    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'workout_exercises')
            ->withPivot('sets', 'reps')
            ->withTimestamps();
    }
}
