@extends('layouts.app')

@section('title', 'Manage Exercises - FitTrack')

@section('content')

    <div class="card">
        <h1>Manage Exercises</h1>
        <p>View and manage exercises available in FitTrack workouts.</p>

        <br>

        <a href="{{ route('exercises.create') }}" class="btn">
            + Add Exercise
        </a>
    </div>

    <div class="card">

        @if($exercises->count())

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Exercise</th>
                        <th>Muscle Group</th>
                        <th>Difficulty</th>
                        <th>Description</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($exercises as $exercise)
                        <tr>
                           <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $exercise->name }}</strong>
                            </td>

                            <td>{{ $exercise->muscle_group }}</td>

                            <td>
                                @if($exercise->difficulty === 'Beginner')
                                    <span style="
                                        display:inline-block;
                                        padding:6px 10px;
                                        background:#dcfce7;
                                        color:#166534;
                                        border-radius:6px;
                                        font-weight:bold;
                                    ">
                                        Beginner
                                    </span>
                                @elseif($exercise->difficulty === 'Intermediate')
                                    <span style="
                                        display:inline-block;
                                        padding:6px 10px;
                                        background:#fef3c7;
                                        color:#92400e;
                                        border-radius:6px;
                                        font-weight:bold;
                                    ">
                                        Intermediate
                                    </span>
                                @else
                                    <span style="
                                        display:inline-block;
                                        padding:6px 10px;
                                        background:#fee2e2;
                                        color:#991b1b;
                                        border-radius:6px;
                                        font-weight:bold;
                                    ">
                                        {{ $exercise->difficulty }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $exercise->description ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else

            <p>No exercises available yet.</p>

            <a href="{{ route('exercises.create') }}" class="btn">
                Add First Exercise
            </a>

        @endif

    </div>

@endsection
