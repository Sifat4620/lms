<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard'); // Prevent already logged-in users from registering
        }
        return view('Dashboard.main.register');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users', // Unique username
            'name' => 'required|string|max:255', // Required full name
            'password' => 'required|string|min:8|confirmed', // Stronger password validation
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create user (Default role: student)
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password), // Secure password
            'role' => 'student', // Automatically assign role as student
            'api_token' => Str::random(60), // Generate API token
        ]);

        // Auto-login after registration
        Auth::login($user);

        // Redirect student to profile page
        return redirect()->route('student.profile')->with('success', 'Registration successful! Welcome, Student.');
    }

    /**
     * API Registration for Mobile or API clients
     */
    public function apiRegister(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user (Default role: student)
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'student', // Automatically set student role
            'api_token' => Str::random(60), // Generate API token for authentication
        ]);

        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
            'token' => $user->api_token
        ], 201);
    }
}
