<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\FitnessGoalController;
use App\Http\Controllers\ProgressRecordController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\AdminController;

Route::get('/exercises/create', [ExerciseController::class, 'create'])
    ->name('exercises.create')->middleware(['auth', 'admin']);

Route::post('/exercises', [ExerciseController::class, 'store'])
    ->name('exercises.store')->middleware(['auth', 'admin']);


Route::get('/exercises', [ExerciseController::class, 'index'])
    ->name('exercises.index')->middleware(['auth', 'admin']);


Route::get('/exercises/{exercise}/edit', [ExerciseController::class, 'edit'])
    ->name('exercises.edit')->middleware(['auth', 'admin']);


Route::put('/exercises/{exercise}', [ExerciseController::class, 'update'])
    ->name('exercises.update')->middleware(['auth', 'admin']);


Route::delete('/exercises/{exercise}', [ExerciseController::class, 'destroy'])
    ->name('exercises.destroy')->middleware(['auth', 'admin']);



Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::get('/', [AuthController::class, 'showLogin']);

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/profile/edit', [ProfileController::class, 'edit'])
    ->name('profile.edit')
    ->middleware('auth');

Route::post('/profile/update', [ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware('auth');

Route::get('/workouts/create', [WorkoutController::class, 'create'])
    ->name('workouts.create')
    ->middleware('auth');

Route::post('/workouts', [WorkoutController::class, 'store'])
    ->name('workouts.store')
    ->middleware('auth');

Route::get('/workouts', [WorkoutController::class, 'index'])
    ->name('workouts.index')
    ->middleware('auth');

Route::get('/workouts/{workout}/edit', [WorkoutController::class, 'edit'])
    ->name('workouts.edit')
    ->middleware('auth');

Route::put('/workouts/{workout}', [WorkoutController::class, 'update'])
    ->name('workouts.update')
    ->middleware('auth');

Route::delete('/workouts/{workout}', [WorkoutController::class, 'destroy'])
    ->name('workouts.destroy')
    ->middleware('auth');


Route::get('/fitness-goals/create', [FitnessGoalController::class, 'create'])
    ->name('fitness_goals.create')
    ->middleware('auth');

Route::post('/fitness-goals', [FitnessGoalController::class, 'store'])
    ->name('fitness_goals.store')
    ->middleware('auth');
Route::get('/fitness-goals', [FitnessGoalController::class, 'index'])
    ->name('fitness_goals.index')
    ->middleware('auth');

Route::get('/fitness-goals/{fitnessGoal}/edit', [FitnessGoalController::class, 'edit'])
    ->name('fitness_goals.edit')
    ->middleware('auth');

Route::put('/fitness-goals/{fitnessGoal}', [FitnessGoalController::class, 'update'])
    ->name('fitness_goals.update')
    ->middleware('auth');

Route::delete('/fitness-goals/{fitnessGoal}', [FitnessGoalController::class, 'destroy'])
    ->name('fitness_goals.destroy')
    ->middleware('auth');


Route::get('/progress/create', [ProgressRecordController::class, 'create'])
    ->name('progress_records.create')
    ->middleware('auth');

Route::post('/progress', [ProgressRecordController::class, 'store'])
    ->name('progress_records.store')
    ->middleware('auth');

Route::get('/progress', [ProgressRecordController::class, 'index'])
    ->name('progress_records.index')
    ->middleware('auth');

Route::get('/progress/{progressRecord}/edit', [ProgressRecordController::class, 'edit'])
    ->name('progress_records.edit')
    ->middleware('auth');

Route::put('/progress/{progressRecord}', [ProgressRecordController::class, 'update'])
    ->name('progress_records.update')
    ->middleware('auth');

Route::delete('/progress/{progressRecord}', [ProgressRecordController::class, 'destroy'])
    ->name('progress_records.destroy')
    ->middleware('auth');

Route::get('/challenges/create', [ChallengeController::class, 'create'])
    ->name('challenges.create')
    ->middleware(['auth', 'admin']);

Route::post('/challenges', [ChallengeController::class, 'store'])
    ->name('challenges.store')
    ->middleware(['auth', 'admin']);

Route::get('/challenges', [ChallengeController::class, 'index'])
    ->name('challenges.index')
    ->middleware('auth');

Route::get('/challenges/{challenge}/edit', [ChallengeController::class, 'edit'])
    ->name('challenges.edit')
    ->middleware(['auth', 'admin']);

Route::put('/challenges/{challenge}', [ChallengeController::class, 'update'])
    ->name('challenges.update')
    ->middleware(['auth', 'admin']);

Route::delete('/challenges/{challenge}', [ChallengeController::class, 'destroy'])
    ->name('challenges.destroy')
    ->middleware(['auth', 'admin']);

Route::post('/challenges/{challenge}/join', [ChallengeController::class, 'join'])
    ->name('challenges.join')
    ->middleware('auth');

Route::get('/my-challenges', [ChallengeController::class, 'myChallenges'])
    ->name('challenges.my')
    ->middleware('auth');

Route::get(
    '/admin/challenges/{challenge}/participants',
    [ChallengeController::class, 'participants']
)->name('challenges.participants')->middleware(['auth', 'admin']);

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware(['auth', 'admin']);

Route::get('/admin/users', [AdminController::class, 'users'])
    ->name('admin.users')
    ->middleware(['auth', 'admin']);

Route::get('/admin/exercises', function () {
    $exercises = \App\Models\Exercise::latest()->get();

    return view('admin.exercises', compact('exercises'));
})->name('admin.exercises')
    ->middleware(['auth', 'admin']);

Route::get('/admin/challenges', function () {
    $challenges = \App\Models\Challenge::latest()->get();

    return view('admin.challenges', compact('challenges'));
})->name('admin.challenges')
    ->middleware(['auth', 'admin']);


