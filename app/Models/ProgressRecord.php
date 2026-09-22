<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ProgressRecord extends Model
{
    protected $fillable = [
        'user_id',
        'record_date',
        'weight',
        'body_fat',
        'workout_count',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
