@extends('layouts.app')

@section('title', 'Add Fitness Goal - FitTrack')

@section('content')

    <div class="card">
        <h1>Add Fitness Goal</h1>
        <p>Set a fitness target and track your progress towards it.</p>
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

        <form action="{{ route('fitness_goals.store') }}" method="POST">
            @csrf

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

                <div style="grid-column:1 / -1;">
                    <label><strong>Fitness Goal</strong></label><br><br>

                    <input type="text"
                           name="goal"
                           value="{{ old('goal') }}"
                           placeholder="e.g. Lose weight, Build muscle, Run 5 km"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Target Value</strong></label><br><br>

                    <input type="number"
                           name="target_value"
                           value="{{ old('target_value') }}"
                           step="0.01"
                           min="0"
                           placeholder="e.g. 70"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

                <div>
                    <label><strong>Unit</strong></label><br><br>

                    <select name="unit"
                            style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">

                        <option value="">Select Unit</option>

                        <option value="kg"
                            {{ old('unit') == 'kg' ? 'selected' : '' }}>
                            Kilograms (kg)
                        </option>

                        <option value="km"
                            {{ old('unit') == 'km' ? 'selected' : '' }}>
                            Kilometers (km)
                        </option>

                        <option value="reps"
                            {{ old('unit') == 'reps' ? 'selected' : '' }}>
                            Reps
                        </option>

                        <option value="minutes"
                            {{ old('unit') == 'minutes' ? 'selected' : '' }}>
                            Minutes
                        </option>

                        <option value="days"
                            {{ old('unit') == 'days' ? 'selected' : '' }}>
                            Days
                        </option>

                    </select>
                </div>

                <div style="grid-column:1 / -1;">
                    <label><strong>Target Date</strong></label><br><br>

                    <input type="date"
                           name="target_date"
                           value="{{ old('target_date') }}"
                           style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                </div>

            </div>

            <br>

            <button type="submit" class="btn">
                Save Goal
            </button>

            <a href="{{ route('fitness_goals.index') }}"
               class="btn"
               style="margin-left:8px;">
                Back to Goals
            </a>

        </form>

    </div>

@endsection
