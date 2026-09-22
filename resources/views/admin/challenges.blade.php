@extends('layouts.app')

@section('title', 'Manage Challenges - FitTrack')

@section('content')

    <div class="card">
        <h1>Manage Challenges</h1>

        <p style="color:#6b7280;">
            Create and manage fitness challenges for FitTrack users.
        </p>

        <a href="{{ route('challenges.create') }}" class="btn">
            + Create Challenge
        </a>
    </div>


    <div class="card">

        @if($challenges->count())

            <div style="overflow-x:auto;">

                <table>

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Challenge</th>
                            <th>Duration</th>
                            <th>Difficulty</th>
                            <th>Dates</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($challenges as $challenge)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>{{ $challenge->title }}</strong>

                                    <br>

                                    <small style="color:#6b7280;">
                                        {{ $challenge->description ?? 'No description' }}
                                    </small>
                                </td>

                                <td style="white-space:nowrap;">
                                    {{ $challenge->duration_days }} days
                                </td>

                                <td>

                                    @if($challenge->difficulty === 'Beginner')

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

                                    @elseif($challenge->difficulty === 'Intermediate')

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
                                            {{ $challenge->difficulty }}
                                        </span>

                                    @endif

                                </td>

                                <td style="white-space:nowrap;">
                                    {{ $challenge->start_date ?? '-' }}
                                    &nbsp;to&nbsp;
                                    {{ $challenge->end_date ?? '-' }}
                                </td>

                                <td style="white-space:nowrap;">

                                    <a
                                        href="{{ route('challenges.edit', $challenge->id) }}"
                                        class="btn"
                                        style="margin-right:5px;">
                                        Edit
                                    </a>

                                    <a
                                       href="{{ route('challenges.participants', $challenge->id) }}"
                                        class="btn"
                                        style="
                                            background:#2563eb;
                                            margin-right:5px;
                                        ">
                                        Participants
                                    </a>

                                    <form
                                        action="{{ route('challenges.destroy', $challenge->id) }}"
                                        method="POST"
                                        style="display:inline;">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn"
                                            style="background:#dc2626;"
                                            onclick="return confirm('Are you sure you want to delete this challenge?');">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <p>No challenges available yet.</p>

            <a href="{{ route('challenges.create') }}" class="btn">
                Create First Challenge
            </a>

        @endif

    </div>


   

@endsection
