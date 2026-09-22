@extends('layouts.app')

@section('title', 'My Challenges - FitTrack')

@section('content')

    <div class="card">
        <h1>My Joined Challenges</h1>
        <p>View the fitness challenges you have joined.</p>
    </div>

    <div class="card">

        @if($challenges->count())

            <table>
                <thead>
                    <tr>
                        <th>Challenge</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Difficulty</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($challenges as $challenge)
                        <tr>
                            <td>
                                <strong>{{ $challenge->title }}</strong>
                            </td>

                            <td>
                                {{ $challenge->description ?? '-' }}
                            </td>

                            <td>
                                {{ $challenge->duration_days }} days
                            </td>

                            <td>
                                {{ $challenge->difficulty }}
                            </td>

                            <td>
                                <span style="
                                    display:inline-block;
                                    padding:6px 10px;
                                    background:#dcfce7;
                                    color:#166534;
                                    border-radius:6px;
                                    font-weight:bold;
                                ">
                                    {{ ucfirst($challenge->pivot->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        @else

            <p>You have not joined any challenges yet.</p>

            <a href="{{ route('challenges.index') }}" class="btn">
                Browse Challenges
            </a>

        @endif

    </div>

    <div class="card">

        <a href="{{ route('challenges.index') }}" class="btn">
            Browse Challenges
        </a>

        <a href="{{ route('dashboard') }}"
           class="btn"
           style="margin-left:8px;">
            Dashboard
        </a>

    </div>

@endsection
