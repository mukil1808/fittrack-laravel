<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Challenge extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration_days',
        'difficulty',
        'start_date',
        'end_date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}
