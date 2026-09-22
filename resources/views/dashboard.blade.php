@extends('layouts.app')

@section('title', 'Dashboard - FitTrack')

@section('content')

    <div class="welcome-section">

        <div>
            <span class="welcome-label">FITNESS DASHBOARD</span>

            <h1>
                Hi, {{ auth()->user()->name }} 👋
            </h1>

            <p>
                Stay consistent, track your progress, and reach your fitness goals.
            </p>
        </div>

        <div class="welcome-icon">
            💪
        </div>

    </div>


    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-title">Workouts</span>
                <span class="stat-icon">💪</span>
            </div>

            <h2>{{ $workoutCount }}</h2>

            <p>Total workouts recorded</p>

        </div>


        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-title">Fitness Goals</span>
                <span class="stat-icon">🎯</span>
            </div>

            <h2>{{ $goalCount }}</h2>

            <p>Goals you are tracking</p>

        </div>


        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-title">Progress</span>
                <span class="stat-icon">📈</span>
            </div>

            <h2>{{ $progressCount }}</h2>

            <p>Progress records added</p>

        </div>

    </div>


    <div class="dashboard-grid">

        <div class="dashboard-card">

            <div class="card-heading">
                <div>
                    <span class="section-label">YOUR FITNESS</span>
                    <h2>Progress Overview</h2>
                </div>

                <span class="heading-icon">📊</span>
            </div>


            @if($latestProgress)

                <div class="progress-item">

                    <div>
                        <span>Current Weight</span>
                        <strong>
                            {{ number_format($latestProgress->weight, 2) }} kg
                        </strong>
                    </div>

                </div>


                <div class="progress-item">

                    <div>
                        <span>Last Updated</span>
                        <strong>
                            {{ $latestProgress->record_date }}
                        </strong>
                    </div>

                </div>

            @else

                <div class="empty-state">
                    <span>📊</span>

                    <p>
                        No progress records yet.
                    </p>

                    <a href="{{ route('progress_records.create') }}" class="btn">
                        Add Progress
                    </a>
                </div>

            @endif

        </div>


        <div class="dashboard-card">

            <div class="card-heading">
                <div>
                    <span class="section-label">STAY CONSISTENT</span>
                    <h2>Fitness Journey</h2>
                </div>

                <span class="heading-icon">🔥</span>
            </div>


            <p class="journey-text">
                Keep recording your workouts and progress regularly.
                Small improvements every day can help you move closer
                to your fitness goals.
            </p>


            <div class="journey-items">

                <a href="{{ route('workouts.index') }}">
                    <span>💪</span>
                    <div>
                        <strong>Track Workouts</strong>
                        <small>Record your daily workouts</small>
                    </div>
                </a>


                <a href="{{ route('fitness_goals.index') }}">
                    <span>🎯</span>
                    <div>
                        <strong>Manage Goals</strong>
                        <small>Keep your fitness goals updated</small>
                    </div>
                </a>


                <a href="{{ route('progress_records.index') }}">
                    <span>📈</span>
                    <div>
                        <strong>Track Progress</strong>
                        <small>Monitor your fitness progress</small>
                    </div>
                </a>

            </div>

        </div>

    </div>


    <style>

        .welcome-section {
            background: linear-gradient(135deg, #166534, #15803d);
            color: white;
            padding: 35px;
            border-radius: 14px;
            margin-bottom: 25px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-shadow: 0 4px 15px rgba(0,0,0,0.10);
        }

        .welcome-label {
            font-size: 13px;
            letter-spacing: 1.5px;
            opacity: 0.8;
            font-weight: bold;
        }

        .welcome-section h1 {
            margin: 8px 0;
            font-size: 32px;
        }

        .welcome-section p {
            margin: 0;
            opacity: 0.9;
        }

        .welcome-icon {
            width: 75px;
            height: 75px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 35px;
        }


        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-title {
            color: #6b7280;
            font-weight: bold;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            background: #dcfce7;
            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
        }

        .stat-card h2 {
            margin: 18px 0 5px;
            font-size: 30px;
            color: #166534;
        }

        .stat-card p {
            margin: 0;
            color: #9ca3af;
            font-size: 14px;
        }


        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .dashboard-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .section-label {
            color: #166534;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .card-heading h2 {
            margin: 5px 0 0;
        }

        .heading-icon {
            font-size: 25px;
        }


        .progress-item {
            padding: 17px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .progress-item:last-child {
            border-bottom: none;
        }

        .progress-item div {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .progress-item span {
            color: #6b7280;
        }

        .progress-item strong {
            color: #166534;
        }


        .journey-text {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .journey-items {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .journey-items a {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px;
            border-radius: 8px;
            background: #f9fafb;

            text-decoration: none;
            color: #1f2937;
        }

        .journey-items a:hover {
            background: #f0fdf4;
        }

        .journey-items a > span {
            font-size: 21px;
        }

        .journey-items strong {
            display: block;
        }

        .journey-items small {
            color: #6b7280;
        }


        .empty-state {
            text-align: center;
            padding: 25px;
            color: #6b7280;
        }

        .empty-state span {
            font-size: 35px;
        }

        .empty-state p {
            margin: 10px 0 15px;
        }


        @media (max-width: 768px) {

            .stats-grid,
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .welcome-section {
                padding: 25px;
            }

            .welcome-section h1 {
                font-size: 25px;
            }

            .welcome-icon {
                display: none;
            }

        }

    </style>

@endsection
