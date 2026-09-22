@extends('layouts.app')

@section('title', 'My Progress - FitTrack')

@section('content')

    <div class="card">
        <h1>My Progress</h1>

        <a href="{{ route('progress_records.create') }}" class="btn">
            + Add Progress
        </a>
    </div>

    <div class="card">

        @if($progressRecords->count())

            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Weight</th>
                        <th>Body Fat</th>
                        <th>Workouts</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($progressRecords as $progress)
                        <tr>
                             <td>{{ $loop->iteration }}</td>
                            <td>{{ $progress->record_date }}</td>

                            <td>
                                @if($progress->weight)
                                    {{ $progress->weight }} kg
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                @if($progress->body_fat)
                                    {{ $progress->body_fat }}%
                                @else
                                    -
                                @endif
                            </td>

                            <td>{{ $progress->workout_count }}</td>

                            <td>{{ $progress->notes ?? '-' }}</td>

                            <td>
                                <a href="{{ route('progress_records.edit', $progress->id) }}"
                                   class="btn">
                                    Edit
                                </a>

                                <form action="{{ route('progress_records.destroy', $progress->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Are you sure you want to delete this progress record?');">

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

            <p>No progress records added yet.</p>

            <a href="{{ route('progress_records.create') }}" class="btn">
                Add Your First Progress Record
            </a>

        @endif

    </div>

@endsection
