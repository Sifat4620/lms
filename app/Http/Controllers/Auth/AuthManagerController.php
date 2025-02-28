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

    public function register(Request $request)
    {   
        // Debugging: Check request data
        // dd($request->all());

        // Validate request input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,student',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Validation failed!');
        }

        // Auto-generate email based on username
        $generatedEmail = strtolower($request->username) . '@lms.com';

        // Prepare user data for insertion
        $userData = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $generatedEmail, // Auto-generated email
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10), // Generates remember_token for security
        ];

        // Debug: Check user data before insertion
        // dd($userData);

        // Check database connection before inserting
        try {
            \DB::connection()->getPdo();
        } catch (\Exception $e) {
            dd('Database connection failed: ' . $e->getMessage());
        }

        // Create user in the database
        $user = User::create($userData);

        // Check if user was created successfully
        if (!$user) {
            return back()->with('error', 'User creation failed. Please try again.');
        }

        // Assign the selected role to the user
        $user->assignRole($request->role);

        // Log user creation
        Log::info('User registered', [
            'username' => $user->username,
            'email' => $user->email,
            'role' => $user->role,
        ]);

        // Log in the user after registration
        Auth::login($user);

        // Redirect based on role
        if ($user->hasRole('admin')) {
            return redirect()->route('index')->with('success', 'Welcome Admin!');
        } else {
            return redirect()->route('student.profile')->with('success', 'Welcome Student!');
        }
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
        // dd($request->password, $user->password);

        // Check if user exists and password is correct
        if ($user && Hash::check($request->password, $user->password)) {

            // Log the user in
            Auth::login($user);


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
