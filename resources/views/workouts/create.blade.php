@extends('layouts.app')

@section('title', 'Add Workout - FitTrack')

@section('content')

    <div class="card">
        <h1>Add Workout</h1>
        <p>Record your workout session and track your activity.</p>
    </div>

    <div class="card">



        

        <form action="{{ route('workouts.store') }}" method="POST">
            @csrf

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

                <div>
                    <label><strong>Workout Date</strong></label><br><br>

                    <input type="date"
                           name="workout_date"
                           value="{{ old('workout_date') }}"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Duration (minutes)</strong></label><br><br>

                    <input type="number"
                           name="duration"
                           value="{{ old('duration') }}"
                           min="1"
                           placeholder="e.g. 45"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div style="grid-column:1 / -1;">
                    <label><strong>Notes</strong></label><br><br>

                    <textarea name="notes"
                              rows="5"
                              placeholder="Describe your workout..."
                              style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;resize:vertical;">{{ old('notes') }}</textarea>
                </div>

            </div>

            <br>

            <button type="submit" class="btn">
                Save Workout
            </button>

            <a href="{{ route('workouts.index') }}"
               class="btn"
               style="margin-left:8px;">
                Back to Workouts
            </a>

        </form>

    </div>

@endsection
