<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthManagerController extends Controller
{
    // Show login form (Only if user is not authenticated)
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('index'); // Redirect if already logged in
        }
        return view('Dashboard.main.page-login');
    }

    // Show registration form (if the user is not logged in)
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('index'); // Redirect if already logged in
        }
        return view('Dashboard.main.page-register');
    }

    // Handle registration request
    public function register(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users,username',
            'name' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,student',  // Ensure the role is either admin or student
        ]);

        // If validation fails, return to the registration form with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create the user
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,  // Assign role based on user input
        ]);

        // Generate a new API token for the user
        $user->api_token = Str::random(60);
        $user->save();

        // Log the user registration event
        Log::info('User registered', ['username' => $user->username, 'role' => $user->role]);

        // Log the user in after registration
        Auth::login($user);

        // Redirect the user based on their role
        if ($user->role === 'admin') {
            return redirect()->route('index')->with('success', 'Welcome Admin!');
        } else {
            return redirect()->route('student.profile')->with('success', 'Welcome Student!');
        }
    }

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
            // Log the user in
            Auth::login($user);
    
            // Check user roles and permissions using dd() for debugging
            dd($user->getRoleNames()); // This will show all roles assigned to the user
            dd($user->getAllPermissions()); // This will show all permissions assigned to the user
    
            // Generate new API token for the user on login
            $user->api_token = Str::random(60);
            $user->save();
    
            // Log the user login event
            Log::info('User logged in', ['username' => $user->username, 'role' => $user->role]);
    
            // Redirect the user based on their role
            if ($user->hasRole('admin')) {
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
        // Validate request input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Find user by username
        $user = User::where('username', $request->username)->first();

        // Check if credentials are valid
        if ($user && Hash::check($request->password, $user->password)) {
            // Generate API token for the user
            $token = Str::random(60);
            $user->api_token = $token;
            $user->save();

            // Log API login event
            Log::info('API login successful', ['username' => $user->username]);

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token
            ], 200);
        }

        // Return error if credentials are invalid
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
