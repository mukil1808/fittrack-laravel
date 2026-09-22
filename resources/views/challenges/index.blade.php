@extends('layouts.app')

@section('title', 'Challenges - FitTrack')

@section('content')

    <div class="card">
        <h1>Fitness Challenges</h1>

        @if (auth()->user()->role === 'admin')
            <a href="{{ route('challenges.create') }}" class="btn">
                + Create Challenge
            </a>
        @endif
    </div>

    <div class="card">

        @if ($challenges->count())

            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Challenge</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Difficulty</th>
                        <th>Dates</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($challenges as $challenge)
                        <tr>
                             <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $challenge->title }}</strong>
                            </td>

                            <td>{{ $challenge->description ?? '-' }}</td>

                            <td>
                                {{ $challenge->duration_days }} days
                            </td>

                            <td>
                                {{ $challenge->difficulty }}
                            </td>

                            <td style="white-space:nowrap;">
                                {{ $challenge->start_date ?? '-' }}
                                &nbsp;to&nbsp;
                                {{ $challenge->end_date ?? '-' }}
                            </td>

                            <td style="white-space:nowrap;">

                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('challenges.edit', $challenge->id) }}" class="btn"
                                        style="margin-right:6px;">
                                        Edit
                                    </a>
                                @endif

                                @if (auth()->user()->challenges->contains($challenge->id))
                                    <button type="button" class="btn" disabled
                                        style="background:#9ca3af;cursor:not-allowed;margin-right:6px;">
                                        Joined
                                    </button>
                                @else
                                    <form action="{{ route('challenges.join', $challenge->id) }}" method="POST"
                                        style="display:inline;margin:0;">

                                        @csrf

                                        <button type="submit" class="btn" style="margin-right:6px;">
                                            Join
                                        </button>

                                    </form>
                                @endif

                                @if (auth()->user()->role === 'admin')
                                    <form action="{{ route('challenges.destroy', $challenge->id) }}" method="POST"
                                        style="display:inline;margin:0;"
                                        onsubmit="return confirm('Are you sure you want to delete this challenge?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn" style="background:#dc2626;">
                                            Delete
                                        </button>

                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No challenges available right now.</p>

        @endif

    </div>

    <div class="card">
        <h2>My Challenges</h2>

        <a href="{{ route('challenges.my') }}" class="btn">
            View Joined Challenges
        </a>
    </div>

@endsection
