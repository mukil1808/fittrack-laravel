@extends('layouts.app')

@section('title', 'Fitness Goals - FitTrack')

@section('content')

    <div class="card">
        <h1>My Fitness Goals</h1>

        <a href="{{ route('fitness_goals.create') }}" class="btn">
            + Add Fitness Goal
        </a>
    </div>

    <div class="card">

        @if($goals->count())

            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Goal</th>
                        <th>Target</th>
                        <th>Target Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($goals as $goal)
                        <tr>
                             <td>{{ $loop->iteration }}</td>
                            <td>{{ $goal->goal }}</td>

                            <td>
                                @if($goal->target_value)
                                    {{ $goal->target_value }}
                                    {{ $goal->unit }}
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                {{ $goal->target_date ?? '-' }}
                            </td>

                            <td>
                                {{ ucfirst($goal->status) }}
                            </td>

                            <td>
                                <a href="{{ route('fitness_goals.edit', $goal->id) }}"
                                   class="btn">
                                    Edit
                                </a>

                                <form action="{{ route('fitness_goals.destroy', $goal->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Are you sure you want to delete this goal?');">

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

            <p>No fitness goals added yet.</p>

            <a href="{{ route('fitness_goals.create') }}" class="btn">
                Add Your First Goal
            </a>

        @endif

    </div>

@endsection
