<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\PlanController;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $topExercises = DB::table('programs')
        ->join('exercises', 'programs.exercise_id', '=', 'exercises.id')
        ->select('exercises.id', 'exercises.name', 'exercises.image', DB::raw('count(*) as count'))
        ->groupBy('exercises.id', 'exercises.name', 'exercises.image')
        ->orderBy('count', 'desc')
        ->take(4)
        ->get();
    $plans = Plan::orderBy('created_at', 'desc')->take(3)->get();
    return view('welcome', compact('topExercises', 'plans'));
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('exercises', ExerciseController::class);
    Route::resource('plans', PlanController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
