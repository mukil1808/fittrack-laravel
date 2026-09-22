@extends('layouts.app')

@section('title', 'Edit Progress - FitTrack')

@section('content')

    <div class="card">
        <h1>Edit Progress Record</h1>
        <p>Update your fitness measurements and progress details.</p>
    </div>

    <div class="card">

        @if($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;margin-bottom:20px;">
                <ul style="margin:0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('progress_records.update', $progressRecord->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

                <div>
                    <label><strong>Record Date</strong></label><br><br>

                    <input type="date"
                           name="record_date"
                           value="{{ old('record_date', $progressRecord->record_date) }}"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Weight (kg)</strong></label><br><br>

                    <input type="number"
                           name="weight"
                           value="{{ old('weight', $progressRecord->weight) }}"
                           step="0.01"
                           min="20"
                           max="500"
                           placeholder="e.g. 70"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Body Fat (%)</strong></label><br><br>

                    <input type="number"
                           name="body_fat"
                           value="{{ old('body_fat', $progressRecord->body_fat) }}"
                           step="0.01"
                           min="0"
                           max="100"
                           placeholder="e.g. 18.5"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Workout Count</strong></label><br><br>

                    <input type="number"
                           name="workout_count"
                           value="{{ old('workout_count', $progressRecord->workout_count) }}"
                           min="0"
                           placeholder="e.g. 4"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div style="grid-column:1 / -1;">
                    <label><strong>Notes</strong></label><br><br>

                    <textarea name="notes"
                              rows="5"
                              placeholder="Add any notes about your progress..."
                              style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;resize:vertical;">{{ old('notes', $progressRecord->notes) }}</textarea>
                </div>

            </div>

            <br>

            <button type="submit" class="btn">
                Update Progress
            </button>

            <a href="{{ route('progress_records.index') }}"
               class="btn"
               style="margin-left:8px;">
                Back to Progress
            </a>

        </form>

    </div>

@endsection
