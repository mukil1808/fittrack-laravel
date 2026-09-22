@extends('layouts.app')

@section('title', 'Manage Users - FitTrack')

@section('content')

    <div class="card">
        <h1>Manage Users</h1>
        <p>View registered FitTrack users and their account roles.</p>
    </div>

    <div class="card">

        @if($users->count())

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Registered On</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                          <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $user->name }}</strong>
                            </td>

                            <td>{{ $user->email }}</td>

                            <td>
                                @if($user->role === 'admin')
                                    <span style="
                                        display:inline-block;
                                        padding:6px 10px;
                                        background:#dcfce7;
                                        color:#166534;
                                        border-radius:6px;
                                        font-weight:bold;
                                    ">
                                        Admin
                                    </span>
                                @else
                                    <span style="
                                        display:inline-block;
                                        padding:6px 10px;
                                        background:#f3f4f6;
                                        color:#374151;
                                        border-radius:6px;
                                        font-weight:bold;
                                    ">
                                        User
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $user->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else

            <p>No users registered yet.</p>

        @endif

    </div>

    

@endsection
