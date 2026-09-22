<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'FitTrack')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f6;
            color: #1f2937;
        }

        /* Top Navbar */
        .topbar {
            height: 65px;
            background: #166534;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar h2 {
            margin: 0;
            font-size: 24px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-name {
            font-weight: bold;
        }

        .logout-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 15px;
            padding: 0;
        }

        .logout-btn:hover {
            text-decoration: underline;
        }

        /* Layout */
        .app-layout {
            display: flex;
            min-height: calc(100vh - 65px);
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: white;
            border-right: 1px solid #e5e7eb;
            padding: 25px 15px;
        }

        .sidebar-title {
            font-size: 13px;
            color: #6b7280;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0 10px 12px;
        }

        .sidebar a {
            display: block;
            color: #1f2937;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background: #dcfce7;
            color: #166534;
        }

        .sidebar .admin-link {
            margin-top: 20px;
            color: #166534;
            font-weight: bold;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            min-width: 0;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Cards */
        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #166534;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn:hover {
            background: #14532d;
        }

        /* Success Message */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f0fdf4;
        }

        /* Mobile */
        @media (max-width: 768px) {

            .topbar {
                padding: 0 15px;
            }

            .topbar h2 {
                font-size: 20px;
            }

            .user-name {
                display: none;
            }

            .app-layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e5e7eb;
                padding: 10px;
            }

            .sidebar a {
                display: inline-block;
                margin: 3px;
            }

            .sidebar-title {
                display: none;
            }

            .main-content {
                padding: 20px 15px;
            }
        }
    </style>
</head>

<body>

    <!-- Top Navbar -->
    <header class="topbar">

        <h2>FitTrack</h2>

        <div class="topbar-right">

            <span class="user-name">
                {{ auth()->user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>

    </header>


    <!-- Sidebar + Main Content -->
    <div class="app-layout">

        <!-- Sidebar -->
        <aside class="sidebar">

            <p class="sidebar-title">Menu</p>

            <a href="{{ route('dashboard') }}">
                🏠 Dashboard
            </a>

            @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin.users') }}">
                    👥 Users
                </a>

                <a href="{{ route('admin.exercises') }}">
                    🏋️ Exercises
                </a>

                <a href="{{ route('admin.challenges') }}">
                    🏆 Challenges
                </a>
            @else
                <a href="{{ route('workouts.index') }}">
                    💪 Workouts
                </a>

                <a href="{{ route('fitness_goals.index') }}">
                    🎯 Goals
                </a>

                <a href="{{ route('progress_records.index') }}">
                    📈 Progress
                </a>

                <a href="{{ route('challenges.index') }}">
                    🏆 Challenges
                </a>

                <a href="{{ route('profile.edit') }}">
                    👤 Profile
                </a>
            @endif
       </aside>


        <!-- Main Content -->
        <main class="main-content">

            <div class="container">

                @if (session('success') && !request()->routeIs('workouts.create'))
                    <div class="success">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')

            </div>

        </main>

    </div>

</body>

</html>
