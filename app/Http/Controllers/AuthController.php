<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Registration method
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    // Login method
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Check the user's status
            $user = Auth::user();

            // Only proceed if the user is active or has the role of 'admin'
            if ($user->status === 'active' || $user->role === 'admin') {
                if ($user->role === 'admin') {
                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('home');
                }
            } else {
                // Logout the user if their status is not active
                Auth::logout();
                return back()->with('warning', 'Your account is not active.');
            }
        }

        return back()->with(
            'warning',
            'The provided credentials do not match our records.',
        );
    }

    // Logout method
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    //change user status
    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status === 'active' ? 'deactivated' : 'active';
        $user->save();

        return redirect()->back()->with('success', 'User status updated successfully.');
    }
}
