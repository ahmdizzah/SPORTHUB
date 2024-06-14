<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Plan;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'admin') {
            $exercises = Exercise::all();
            $plans = Plan::all();
            $users = User::all();

            return view('dashboard.index', compact('exercises', 'plans', 'users'));
        } else if ($role == 'user') {
            return view('welcome');
        } else {
            return redirect('/');
        }
    }
}
