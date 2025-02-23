<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthManagerController extends Controller
{
    // Show login form (Only if user is not authenticated)
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard'); // Redirect if already logged in
        }
        return view('Dashboard.main.page-login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate request input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Find user by username
        $user = User::where('username', $request->username)->first();

        // Check if user exists and password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Log in the user
            Auth::login($user);

            // Generate new API token on login
            $user->api_token = Str::random(60);
            $user->save();

            // Redirect user based on role
            if ($user->role === 'admin') {
                return redirect()->route('index')->with('success', 'Welcome Admin!');
            } else {
                return redirect()->route('student.profile')->with('success', 'Welcome Student!');
            }
        }

        // Return error if login fails
        return back()->withErrors(['message' => 'Invalid credentials'])->withInput();
    }

    // Handle API-based login (for mobile or API clients)
    public function apiLogin(Request $request)
    {
        // Validate request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Find user
        $user = User::where('username', $request->username)->first();

        // Check credentials
        if ($user && Hash::check($request->password, $user->password)) {
            // Generate API token
            $token = Str::random(60);
            $user->api_token = $token;
            $user->save();

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Handle logout (Both web & API)
    public function logout(Request $request)
    {
        // If API request, clear API token
        if ($request->wantsJson()) {
            $user = Auth::user();
            if ($user) {
                $user->api_token = null;
                $user->save();
            }
            return response()->json(['message' => 'Logged out successfully'], 200);
        }

        // Web logout
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
