@extends('layouts.app')

@section('title', 'Add Exercise - FitTrack')

@section('content')

    <div class="card">
        <h1>Add Exercise</h1>

        <p style="color:#6b7280;">
            Add a new exercise to the FitTrack workout library.
        </p>
    </div>


    <div class="card">

        @if($errors->any())
            <div class="error-box">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('exercises.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Exercise Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Push Up"
                    required
                >
            </div>


            <div class="form-group">
                <label>Description</label>

                <textarea
                    name="description"
                    rows="4"
                    placeholder="Describe the exercise..."
                >{{ old('description') }}</textarea>
            </div>


            <div class="form-group">
                <label>Muscle Group</label>

                <input
                    type="text"
                    name="muscle_group"
                    value="{{ old('muscle_group') }}"
                    placeholder="e.g. Chest"
                    required
                >
            </div>


            <div class="form-group">
                <label>Difficulty</label>

                <select name="difficulty" required>

                    <option value="">Select Difficulty</option>

                    <option value="Beginner"
                        {{ old('difficulty') == 'Beginner' ? 'selected' : '' }}>
                        Beginner
                    </option>

                    <option value="Intermediate"
                        {{ old('difficulty') == 'Intermediate' ? 'selected' : '' }}>
                        Intermediate
                    </option>

                    <option value="Advanced"
                        {{ old('difficulty') == 'Advanced' ? 'selected' : '' }}>
                        Advanced
                    </option>

                </select>
            </div>


            <button type="submit" class="btn">
                Add Exercise
            </button>

            <a
                href="{{ route('admin.exercises') }}"
                class="btn"
                style="margin-left:8px;background:#6b7280;">
                Cancel
            </a>

        </form>

    </div>


    <style>

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #166534;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 20px;
        }

    </style>

@endsection
