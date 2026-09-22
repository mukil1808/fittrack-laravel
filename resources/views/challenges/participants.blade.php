@extends('layouts.app')

@section('title', 'Challenge Participants - FitTrack')

@section('content')

    <div class="card">

        <h1>Challenge Participants</h1>

        <p style="color:#6b7280;">
            Users who joined this fitness challenge.
        </p>

        <div style="
            background:#f0fdf4;
            padding:15px;
            border-radius:8px;
            margin-top:20px;
        ">

            <strong>{{ $challenge->title }}</strong>

            <br>

            <span style="color:#6b7280;">
                {{ $challenge->duration_days }} days
                &nbsp; | &nbsp;
                {{ $challenge->difficulty }}
            </span>

        </div>

    </div>


    <div class="card">

        <h2>
            Participants
            <span style="
                font-size:16px;
                color:#6b7280;
                font-weight:normal;
            ">
                ({{ $participants->count() }})
            </span>
        </h2>


        @if($participants->count())

            <div style="overflow-x:auto;">

                <table>

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Joined On</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($participants as $participant)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $participant->name }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $participant->email }}
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
                                        {{ ucfirst($participant->pivot->status) }}
                                    </span>

                                </td>

                                <td style="white-space:nowrap;">
                                    {{ $participant->pivot->created_at?->format('Y-m-d') ?? '-' }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div style="
                background:#f9fafb;
                padding:20px;
                border-radius:8px;
                color:#6b7280;
            ">
                No users have joined this challenge yet.
            </div>

        @endif

    </div>


    <div class="card">

        <a
            href="{{ route('admin.challenges') }}"
            class="btn">
            Back to Manage Challenges
        </a>

    </div>

@endsection
