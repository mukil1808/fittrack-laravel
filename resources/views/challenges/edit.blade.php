@extends('layouts.app')

@section('title', 'Edit Challenge - FitTrack')

@section('content')

    <div class="card">
        <h1>Edit Fitness Challenge</h1>
        <p>Update the challenge details and schedule.</p>
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

        <form action="{{ route('challenges.update', $challenge->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

                <div style="grid-column:1 / -1;">
                    <label><strong>Challenge Title</strong></label><br><br>

                    <input type="text"
                           name="title"
                           value="{{ old('title', $challenge->title) }}"
                           placeholder="e.g. 30 Day Fitness Challenge"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div style="grid-column:1 / -1;">
                    <label><strong>Description</strong></label><br><br>

                    <textarea name="description"
                              rows="5"
                              placeholder="Describe the challenge..."
                              style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;resize:vertical;">{{ old('description', $challenge->description) }}</textarea>
                </div>

                <div>
                    <label><strong>Duration (Days)</strong></label><br><br>

                    <input type="number"
                           name="duration_days"
                           value="{{ old('duration_days', $challenge->duration_days) }}"
                           min="1"
                           placeholder="e.g. 30"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Difficulty</strong></label><br><br>

                    <select name="difficulty"
                            style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">

                        <option value="">Select Difficulty</option>

                        <option value="Beginner"
                            {{ old('difficulty', $challenge->difficulty) == 'Beginner' ? 'selected' : '' }}>
                            Beginner
                        </option>

                        <option value="Intermediate"
                            {{ old('difficulty', $challenge->difficulty) == 'Intermediate' ? 'selected' : '' }}>
                            Intermediate
                        </option>

                        <option value="Advanced"
                            {{ old('difficulty', $challenge->difficulty) == 'Advanced' ? 'selected' : '' }}>
                            Advanced
                        </option>

                    </select>
                </div>

                <div>
                    <label><strong>Start Date</strong></label><br><br>

                    <input type="date"
                           name="start_date"
                           value="{{ old('start_date', $challenge->start_date) }}"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>End Date</strong></label><br><br>

                    <input type="date"
                           name="end_date"
                           value="{{ old('end_date', $challenge->end_date) }}"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

            </div>

            <br>

            <button type="submit" class="btn">
                Update Challenge
            </button>

            <a href="{{ route('challenges.index') }}"
               class="btn"
               style="margin-left:8px;">
                Back to Challenges
            </a>

        </form>

    </div>

@endsection
