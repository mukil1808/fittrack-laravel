<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FitnessGoal extends Model
{
    protected $fillable = [
        'user_id',
        'goal',
        'target_value',
        'unit',
        'target_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
