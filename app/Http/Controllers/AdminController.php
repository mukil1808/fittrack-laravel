<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }

    public function dashboard()
    {
        $userCount = User::count();
        $exerciseCount = \App\Models\Exercise::count();
        $challengeCount = \App\Models\Challenge::count();

        return view('admin.dashboard', compact(
            'userCount',
            'exerciseCount',
            'challengeCount'
        ));
    }
}
