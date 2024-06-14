<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->role == 'admin') {
            return view('dashboard.profile.index', compact('user'));
        } else {
            return view('pages.profile.index', compact('user'));
        }
    }
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        $user = Auth::user();
        if (Auth::user()->role == 'admin') {
            return view('dashboard.profile.edit', compact('user'));
        } else {
            return view('pages.profile.edit', compact('user'));
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($user->image) {
                $oldImagePath = public_path('assets/images/users/' . $user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = $user->username . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/users/'), $imageName);
            $user->image = $imageName;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
