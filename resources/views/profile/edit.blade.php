@extends('layouts.app')

@section('title', 'My Profile - FitTrack')

@section('content')

    <div class="card">
    <h1>My Profile</h1>
    <p>Update your personal and fitness information.</p>
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

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

            <div>
                <label><strong>Age</strong></label><br><br>

                <input type="number"
                       name="age"
                       value="{{ $profile?->age }}"
                       min="1"
                       max="100"
                       style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
            </div>

            <div>
                <label><strong>Gender</strong></label><br><br>

                <select name="gender"
                        style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                    <option value="">Select Gender</option>

                    <option value="Male"
                        {{ $profile?->gender == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ $profile?->gender == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                    <option value="Other"
                        {{ $profile?->gender == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>
                </select>
            </div>

            <div>
                <label><strong>Height (cm)</strong></label><br><br>

                <input type="number"
                       step="0.01"
                       name="height"
                       value="{{ $profile?->height }}"
                       placeholder="e.g. 175"
                       style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
            </div>

            <div>
                <label><strong>Weight (kg)</strong></label><br><br>

                <input type="number"
                       step="0.01"
                       name="weight"
                       value="{{ $profile?->weight }}"
                       placeholder="e.g. 70"
                       style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
            </div>

            <div style="grid-column:1 / -1;">
                <label><strong>Fitness Level</strong></label><br><br>

                <select name="fitness_level"
                        style="width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;">
                    <option value="">Select Fitness Level</option>

                    <option value="Beginner"
                        {{ $profile?->fitness_level == 'Beginner' ? 'selected' : '' }}>
                        Beginner
                    </option>

                    <option value="Intermediate"
                        {{ $profile?->fitness_level == 'Intermediate' ? 'selected' : '' }}>
                        Intermediate
                    </option>

                    <option value="Advanced"
                        {{ $profile?->fitness_level == 'Advanced' ? 'selected' : '' }}>
                        Advanced
                    </option>
                </select>
            </div>

        </div>

        <br>

        <button type="submit" class="btn">
            Save Profile
        </button>

    </form>

</div>



@endsection
