@extends('layouts.app')

@section('title', 'Edit Workout - FitTrack')

@section('content')

    <div class="card">
        <h1>Edit Workout</h1>
        <p>Update your workout details and exercise information.</p>
    </div>

    <div class="card">

        @if ($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;margin-bottom:20px;">
                <ul style="margin:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('workouts.update', $workout->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

                <div>
                    <label><strong>Workout Date</strong></label><br><br>

                    <input type="date" name="workout_date" value="{{ old('workout_date', $workout->workout_date) }}"
                        style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Duration (minutes)</strong></label><br><br>

                    <input type="number" name="duration" value="{{ old('duration', $workout->duration) }}" min="1"
                        placeholder="e.g. 45" style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div style="grid-column:1 / -1;">
                    <label><strong>Notes</strong></label><br><br>

                    <textarea name="notes" rows="4" placeholder="Describe your workout..."
                        style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;resize:vertical;">{{ old('notes', $workout->notes) }}</textarea>
                </div>

            </div>

            <hr style="margin:30px 0;border:0;border-top:1px solid #e5e7eb;">

            <h2>Add Exercise</h2>
            <p>Select an exercise and record your sets and reps.</p>

            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;">

                <div>
                    <label><strong>Exercise</strong></label><br><br>

                    <select name="exercise_id" style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">

                        <option value="">Select Exercise</option>

                        @foreach ($exercises as $exercise)
                            <option value="{{ $exercise->id }}"
                                {{ $selectedExercise?->id == $exercise->id ? 'selected' : '' }}>
                                {{ $exercise->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div>
                    <label><strong>Sets</strong></label><br><br>

                    <input type="number" name="sets" min="1" value="{{ $selectedExercise?->pivot->sets }}"
                        placeholder="e.g. 3" style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Reps</strong></label><br><br>
                    <input type="number" name="reps" min="1" value="{{ $selectedExercise?->pivot->reps }}"
                        placeholder="e.g. 12" style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

            </div>

            <br><br>

            <button type="submit" class="btn">
                Update Workout
            </button>

            <a href="{{ route('workouts.index') }}" class="btn" style="margin-left:8px;">
                Back to Workouts
            </a>

        </form>

    </div>

@endsection
