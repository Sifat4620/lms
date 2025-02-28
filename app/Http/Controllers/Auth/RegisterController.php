<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        if (auth()->check()) {
            return redirect()->route('index'); 
        }
        return view('Dashboard.main.register'); 
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        // Debugging: Check request data before processing
        // dd($request->all());

        // Validate input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check validation errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Validation failed!');
        }

        // Auto-generate email based on username
        $generatedEmail = strtolower($request->username) . '@lms.com';

        // Prepare user data
        $userData = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $generatedEmail,  // Auto-generated email
            'password' => Hash::make($request->password),
        ];

        // Debug: Check user data before insertion
        // dd($userData);

        // Check database connection before inserting
        try {
            \DB::connection()->getPdo();
        } catch (\Exception $e) {
            dd('Database connection failed: ' . $e->getMessage());
        }

        // Create the user
        $user = User::create($userData);

        // Check if user was created successfully
        if (!$user) {
            return back()->with('error', 'User creation failed. Please try again.');
        }

        // Log user creation
        Log::info('User registered', [
            'username' => $user->username,
            'email' => $user->email,
        ]);

        // Auto-login the user after registration
        Auth::login($user);

        // Redirect to dashboard or user profile
        return redirect()->route('index')->with('success', 'Registration successful! Welcome, ' . $user->name);
    }
}
