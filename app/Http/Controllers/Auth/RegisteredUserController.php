<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // logic to register
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12|regex:/[a-zA-Z0-9@!$%*#?&]/',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect('register')
            ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'email' => $request->email,
            'role' => 'user',
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'tgl_lahir' => $request->tgl_lahir,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            
        ]);
        
        event(new Registered($user));
        return redirect('login')->with('msg', 'Register success');
    }
}
