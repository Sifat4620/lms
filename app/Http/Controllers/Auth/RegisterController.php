<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('Dashboard.main.register');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        // Validate input (changed 'email' to 'username')
        $request->validate([
            'username' => 'required|string|max:255|unique:users', // Username is required and unique
            'name' => 'required|string|max:255', // Name is required
            'password' => 'required|string|min:6|confirmed', // Password with confirmation
        ]);
    
        // Create user
        $user = User::create([
            'username' => $request->username, // Store username instead of email
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
    
        // Log in the user
        Auth::login($user);
    
        // Redirect to the dashboard
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
    
}
