<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;
use DateTime;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'admin') {
            $exercises = Exercise::all();
            $plans = Plan::all();
            $users = User::all();
            $newRegisteredUsers = User::where('created_at', '>=', now()->subDays(7))->get();
            $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();
            $usersGrowth =
                User::select(DB::raw('count(*) as count'), DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();
            $topExercises = DB::table('programs')
                ->join('exercises', 'programs.exercise_id', '=', 'exercises.id')
                ->select('exercises.name', DB::raw('count(*) as count'))
                ->groupBy('exercises.name')
                ->orderBy('count', 'desc')
                ->take(5)
                ->get();

            return view('dashboard.index', compact(
                'exercises',
                'plans',
                'users',
                'newRegisteredUsers',
                'recentUsers',
                'usersGrowth',
                'topExercises'
            ));
        } else if ($role == 'user') {
            return view('welcome');
        } else {
            return redirect('/');
        }
    }
}
