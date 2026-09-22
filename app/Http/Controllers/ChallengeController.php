<?php

namespace App\Http\Controllers;
use App\Models\Challenge;
use Illuminate\Http\Request;



class ChallengeController extends Controller
{
    public function create()
    {
        abort_unless(auth()->user()->role === 'admin', 403);
        return view('challenges.create');
    }

    public function store(Request $request)
    {

        abort_unless(auth()->user()->role === 'admin', 403);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_days' => 'required|integer|min:1',
            'difficulty' => 'required|string|max:50',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Challenge::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration_days' => $request->duration_days,
            'difficulty' => $request->difficulty,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.challenges')
            ->with('success', 'Challenge created successfully!');
    }
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.challenges');
        }

        $challenges = Challenge::latest()->get();

        return view('challenges.index', compact('challenges'));
    }
    public function edit(Challenge $challenge)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('challenges.edit', compact('challenge'));
    }
    public function update(Request $request, Challenge $challenge)
    {

        abort_unless(auth()->user()->role === 'admin', 403);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_days' => 'required|integer|min:1',
            'difficulty' => 'required|string|max:50',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $challenge->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration_days' => $request->duration_days,
            'difficulty' => $request->difficulty,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.challenges')
            ->with('success', 'Challenge updated successfully!');
    }
    public function destroy(Challenge $challenge)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $challenge->delete();

        return redirect()
            ->route('admin.challenges')
            ->with('success', 'Challenge deleted successfully!');
    }
    public function join(Challenge $challenge)
    {
        $user = auth()->user();

        $user->challenges()->syncWithoutDetaching([
            $challenge->id => [
                'status' => 'joined',
            ]
        ]);

        return redirect()
            ->route('challenges.index')
            ->with('success', 'Challenge joined successfully!');
    }

    public function myChallenges()
    {
        $challenges = auth()->user()->challenges()->latest()->get();

        return view('challenges.my', compact('challenges'));
    }

    public function participants(Challenge $challenge)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $participants = $challenge->users()->latest()->get();

        return view('challenges.participants', compact('challenge', 'participants'));
    }
}
