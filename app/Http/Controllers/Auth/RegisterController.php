<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        // Prevent already logged-in users from registering
        if (auth()->check()) {
            return redirect()->route('index'); // Redirect logged-in users to the dashboard
        }
        return view('Dashboard.main.register'); // The registration page view
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        // Validate input fields
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users', // Ensure unique username
            'name' => 'required|string|max:255', // Full name is required
            'password' => 'required|string|min:8|confirmed', // Ensure strong password and confirmation
        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create the user and assign the role as 'student' by default
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password), // Secure password
            'role' => 'student', // Default role is 'student'
            'api_token' => Str::random(60), // Generate a random API token for the user
        ]);

        // Redirect to the login page after successful registration
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    /**
     * Handle the API registration (for mobile or API clients).
     */
    public function apiRegister(Request $request)
    {
        // Validate input fields
        $request->validate([
            'username' => 'required|string|max:255|unique:users', // Ensure unique username
            'name' => 'required|string|max:255', // Full name is required
            'password' => 'required|string|min:6|confirmed', // Ensure strong password and confirmation
        ]);

        // Create the user and assign 'student' role by default
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password), // Secure password
            'role' => 'student', // Default role is 'student'
            'api_token' => Str::random(60), // Generate a random API token for the user
        ]);

        // Return a JSON response for API clients
        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
            'token' => $user->api_token
        ], 201);
    }
}
