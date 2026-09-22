<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;

class WorkoutController extends Controller
{
    public function create()
    {
        return view('workouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'workout_date' => 'required|date',
            'duration' => 'nullable|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        Workout::create([
            'user_id' => auth()->id(),
            'workout_date' => $request->workout_date,
            'duration' => $request->duration,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('workouts.create')
            ->with('success', 'Workout added successfully!');
    }

    public function index()
    {
        $workouts = auth()->user()->workouts()->latest()->get();

        return view('workouts.index', compact('workouts'));
    }

    public function edit(Workout $workout)
    {
        abort_unless($workout->user_id === auth()->id(), 403);

        $exercises = \App\Models\Exercise::all();

        $selectedExercise = $workout->exercises->first();

        return view('workouts.edit', compact(
            'workout',
            'exercises',
            'selectedExercise'
        ));
    }
    public function update(Request $request, Workout $workout)
    {
        abort_unless($workout->user_id === auth()->id(), 403);
        $request->validate([
            'workout_date' => 'required|date',
            'duration' => 'nullable|integer|min:1',
            'notes' => 'nullable|string',
            'exercise_id' => 'nullable|exists:exercises,id',
            'sets' => 'nullable|integer|min:1',
            'reps' => 'nullable|integer|min:1',
        ]);

        $workout->update([
            'workout_date' => $request->workout_date,
            'duration' => $request->duration,
            'notes' => $request->notes,
        ]);

        if ($request->exercise_id) {
            $workout->exercises()->syncWithoutDetaching([
                $request->exercise_id => [
                    'sets' => $request->sets,
                    'reps' => $request->reps,
                ]
            ]);
        }

        return redirect()
            ->route('workouts.index')
            ->with('success', 'Workout updated successfully!');
    }

    public function destroy(Workout $workout)
    {
        abort_unless($workout->user_id === auth()->id(), 403);

        $workout->delete();

        return redirect()->route('workouts.index')
            ->with('success', 'Workout deleted successfully!');
    }

}
