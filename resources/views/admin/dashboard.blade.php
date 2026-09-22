@extends('layouts.app')

@section('title', 'Admin Dashboard - FitTrack')

@section('content')

    <div class="card">
        <h1>Admin Dashboard</h1>

        <p style="color:#6b7280;">
            Manage FitTrack users, exercises, and fitness challenges.
        </p>
    </div>


    <div class="admin-stats">

        <div class="stat-card">

            <div class="stat-icon">
                👥
            </div>

            <div>
                <p>Total Users</p>

                <h2>{{ $userCount }}</h2>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                🏋️
            </div>

            <div>
                <p>Total Exercises</p>

                <h2>{{ $exerciseCount }}</h2>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                🏆
            </div>

            <div>
                <p>Total Challenges</p>

                <h2>{{ $challengeCount }}</h2>
            </div>

        </div>

    </div>


    <style>

        .admin-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);

            display: flex;
            align-items: center;
            gap: 18px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;

            background: #dcfce7;
            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 27px;
        }

        .stat-card p {
            margin: 0 0 6px;
            color: #6b7280;
            font-size: 14px;
        }

        .stat-card h2 {
            margin: 0;
            color: #166534;
            font-size: 28px;
        }

        @media (max-width: 768px) {

            .admin-stats {
                grid-template-columns: 1fr;
            }

        }

    </style>

@endsection
