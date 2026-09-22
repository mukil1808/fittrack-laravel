<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Admin users should use the Admin Dashboard
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $workoutCount = $user->workouts()->count();

        $goalCount = $user->fitnessGoals()->count();

        $progressCount = $user->progressRecords()->count();

        $latestProgress = $user->progressRecords()
            ->latest('record_date')
            ->first();

        return view('dashboard', compact(
            'workoutCount',
            'goalCount',
            'progressCount',
            'latestProgress'
        ));
    }
}
