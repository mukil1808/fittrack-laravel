@extends('layouts.app')

@section('title', 'My Workouts - FitTrack')

@section('content')

    <div class="card">
        <h1>My Workouts</h1>

        <a href="{{ route('workouts.create') }}" class="btn">
            + Add Workout
        </a>
    </div>

    <div class="card">

        @if($workouts->count())

            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th>Exercises</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($workouts as $workout)
                        <tr>
                             <td>{{ $loop->iteration }}</td>
                            <td>{{ $workout->workout_date }}</td>

                            <td>
                                {{ $workout->duration ?? '-' }}
                                {{ $workout->duration ? 'min' : '' }}
                            </td>

                            <td>
                                @if($workout->exercises->count())
                                    @foreach($workout->exercises as $exercise)
                                        <strong>{{ $exercise->name }}</strong>
                                        <br>
                                        {{ $exercise->pivot->sets }}
                                        sets ×
                                        {{ $exercise->pivot->reps }}
                                        reps
                                        <br><br>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ $workout->notes ?? '-' }}</td>

                            <td>
                                <a href="{{ route('workouts.edit', $workout->id) }}"
                                   class="btn">
                                    Edit
                                </a>

                                <form action="{{ route('workouts.destroy', $workout->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Are you sure you want to delete this workout?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else

            <p>No workouts recorded yet.</p>

            <a href="{{ route('workouts.create') }}" class="btn">
                Add Your First Workout
            </a>

        @endif

    </div>

@endsection
