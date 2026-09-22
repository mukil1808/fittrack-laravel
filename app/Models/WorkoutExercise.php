<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workout;
use App\Models\Exercise;

class WorkoutExercise extends Model
{
    protected $fillable = [
        'workout_id',
        'exercise_id',
        'sets',
        'reps',
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
