<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FitnessGoal;

class FitnessGoalController extends Controller
{
    public function create()
    {
        return view('fitness_goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'goal' => 'required|string|max:255',
            'target_value' => 'nullable|numeric|min:0',
            'unit' => 'nullable|string|max:50',
            'target_date' => 'nullable|date',
        ]);

        FitnessGoal::create([
            'user_id' => auth()->id(),
            'goal' => $request->goal,
            'target_value' => $request->target_value,
            'unit' => $request->unit,
            'target_date' => $request->target_date,
            'status' => 'active',
        ]);

        return redirect()
            ->route('fitness_goals.create')
            ->with('success', 'Fitness goal added successfully!');
    }

    public function index()
    {
        $goals = auth()->user()->fitnessGoals()->latest()->get();

        return view('fitness_goals.index', compact('goals'));
    }

    public function edit(FitnessGoal $fitnessGoal)
    {
        abort_unless($fitnessGoal->user_id === auth()->id(), 403);

        return view('fitness_goals.edit', compact('fitnessGoal'));
    }

    public function update(Request $request, FitnessGoal $fitnessGoal)
    {
        abort_unless($fitnessGoal->user_id === auth()->id(), 403);
        $request->validate([
            'goal' => 'required|string|max:255',
            'target_value' => 'nullable|numeric|min:0',
            'unit' => 'nullable|string|max:50',
            'target_date' => 'nullable|date',
            'status' => 'required|in:active,completed',
        ]);

        $fitnessGoal->update([
            'goal' => $request->goal,
            'target_value' => $request->target_value,
            'unit' => $request->unit,
            'target_date' => $request->target_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('fitness_goals.index')
            ->with('success', 'Fitness goal updated successfully!');
    }
    public function destroy(FitnessGoal $fitnessGoal)
    {
        abort_unless($fitnessGoal->user_id === auth()->id(), 403);

        $fitnessGoal->delete();

        return redirect()
            ->route('fitness_goals.index')
            ->with('success', 'Fitness goal deleted successfully!');
    }
}
