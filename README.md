# FitTrack

FitTrack is a fitness tracking web application built with Laravel, PHP, and MySQL. It allows users to record workouts, manage fitness goals, track progress, and participate in fitness challenges.

The application also includes an admin panel for managing users, exercises, and fitness challenges.

## Features

### User Features

- User registration and login
- Secure password hashing
- Personal fitness profile management
- Add, view, edit, and delete workouts
- Add and manage fitness goals
- Record and monitor fitness progress
- Browse available fitness challenges
- Join fitness challenges
- View joined challenges
- User-specific data access

### Admin Features

- Admin authentication and role-based access
- Admin dashboard with summary statistics
- View registered users
- Manage exercises
- Create, edit, and delete fitness challenges
- View users who joined each challenge
- Separate admin and user navigation

## Technologies Used

- PHP
- Laravel
- MySQL
- Blade
- HTML
- CSS
- JavaScript
- Git & GitHub

## Main Modules

- Authentication
- User Profile
- Workout Management
- Exercise Management
- Fitness Goals
- Progress Tracking
- Fitness Challenges
- Admin Management

## Database Structure

The application uses MySQL with Laravel migrations.

Main tables include:

- `users`
- `profiles`
- `exercises`
- `workouts`
- `workout_exercises`
- `fitness_goals`
- `progress_records`
- `challenges`
- `challenge_user`

The `workout_exercises` table connects workouts with exercises and stores sets and repetitions.

The `challenge_user` table manages the many-to-many relationship between users and fitness challenges.

## User and Admin Roles

### User

Normal users can:

- Manage their profile
- Track workouts
- Manage fitness goals
- Record progress
- Join fitness challenges

### Admin

Administrators can:

- View users
- Manage exercises
- Manage fitness challenges
- View challenge participants

Role-based access is handled using Laravel middleware.

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/mukil1808/fittrack-laravel.git
cd fittrack-laravel
