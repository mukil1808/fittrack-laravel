<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function create()
    {
        return view('exercises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'muscle_group' => 'required|string|max:100',
            'difficulty' => 'required|string|max:50',
        ]);

        Exercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'muscle_group' => $request->muscle_group,
            'difficulty' => $request->difficulty,
        ]);

        return redirect()->back()->with('success', 'Exercise added successfully!');
    }

    public function index()
    {
        $exercises = Exercise::all();

        return view('exercises.index', compact('exercises'));
    }

    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'muscle_group' => 'required|string|max:100',
            'difficulty' => 'required|string|max:50',
        ]);

        $exercise->update([
            'name' => $request->name,
            'description' => $request->description,
            'muscle_group' => $request->muscle_group,
            'difficulty' => $request->difficulty,
        ]);

        return redirect()
            ->route('exercises.index')
            ->with('success', 'Exercise updated successfully!');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()
            ->route('exercises.index')
            ->with('success', 'Exercise deleted successfully!');
    }
}
