<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressRecord;

class ProgressRecordController extends Controller
{
    public function create()
    {
        return view('progress_records.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'record_date' => 'required|date',
            'weight' => 'nullable|numeric|min:20|max:500',
            'body_fat' => 'nullable|numeric|min:0|max:100',
            'workout_count' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
        ]);

        ProgressRecord::create([
            'user_id' => auth()->id(),
            'record_date' => $request->record_date,
            'weight' => $request->weight,
            'body_fat' => $request->body_fat,
            'workout_count' => $request->workout_count ?? 0,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('progress_records.create')
            ->with('success', 'Progress record added successfully!');
    }
    public function index()
    {
        $progressRecords = auth()->user()->progressRecords()
            ->latest('record_date')
            ->get();

        return view('progress_records.index', compact('progressRecords'));
    }
    public function edit(ProgressRecord $progressRecord)
    {
        abort_unless($progressRecord->user_id === auth()->id(), 403);

        return view('progress_records.edit', compact('progressRecord'));
    }
    public function update(Request $request, ProgressRecord $progressRecord)
    {

        abort_unless($progressRecord->user_id === auth()->id(), 403);
        $request->validate([
            'record_date' => 'required|date',
            'weight' => 'nullable|numeric|min:20|max:500',
            'body_fat' => 'nullable|numeric|min:0|max:100',
            'workout_count' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
        ]);

        $progressRecord->update([
            'record_date' => $request->record_date,
            'weight' => $request->weight,
            'body_fat' => $request->body_fat,
            'workout_count' => $request->workout_count ?? 0,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('progress_records.index')
            ->with('success', 'Progress record updated successfully!');
    }
    public function destroy(ProgressRecord $progressRecord)
    {
        abort_unless($progressRecord->user_id === auth()->id(), 403);

        $progressRecord->delete();

        return redirect()
            ->route('progress_records.index')
            ->with('success', 'Progress record deleted successfully!');
    }
}
