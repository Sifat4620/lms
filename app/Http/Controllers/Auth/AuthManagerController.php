<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthManagerController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('Dashboard.main.page-login');
    }

    public function login(Request $request)
    {
        // Validate input fields
        $credentials = $request->validate([
            'username' => 'required|string', // Change to 'username' for validation
            'password' => 'required|string|min:6',
        ]);

        // Retrieve the user based on 'username' (formerly 'name')
        $user = User::where('username', $request->username)->first();

        // Check if user exists and password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);
            
            // Redirect to the index page after successful login
            return redirect()->route('index'); // Redirect to the 'index' route
        }

        // Return back with error message if login fails
        return back()->withErrors(['message' => 'Invalid credentials']);
    }


    // Handle logout logic
    public function logout()
    {
        // Log the user out
        Auth::logout();
        return redirect()->route('login'); // Redirect back to login page
    }
}
