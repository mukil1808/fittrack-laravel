<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - FitTrack</title>

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

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-card {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            color: #166534;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #166534;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #166534;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
        }

        .btn:hover {
            background: #14532d;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
        }

        .login-link a {
            color: #166534;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="register-wrapper">

        <div class="register-card">

            <h1 class="logo">FitTrack</h1>

            <p class="subtitle">
                Create your account and start your fitness journey
            </p>

            @if ($errors->any())
                <div class="error">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Create a password"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        required
                    >
                </div>

                <button type="submit" class="btn">
                    Create Account
                </button>

            </form>

            <div class="login-link">
                Already have an account?
                <a href="{{ route('login') }}">Login here</a>
            </div>

        </div>

    </div>

</body>

</html>
