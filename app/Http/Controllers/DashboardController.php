<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'admin') {
            return view('admin.dashboard', ['users' => User::all()]);
        } else if ($role == 'user') {
            return view('welcome');
        } else {
            return redirect('/');
        }
    }
}
