<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = auth()->user()->profile;

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'age' => 'nullable|integer|min:1|max:100',
            'gender' => 'nullable|string|max:50',
            'height' => 'nullable|numeric|min:50|max:300',
            'weight' => 'nullable|numeric|min:20|max:500',
            'fitness_level' => 'nullable|string|max:50',
        ]);

        $profile = auth()->user()->profile()->updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'age' => $request->age,
                'gender' => $request->gender,
                'height' => $request->height,
                'weight' => $request->weight,
                'fitness_level' => $request->fitness_level,
            ]
        );
        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully!');
    }
}
