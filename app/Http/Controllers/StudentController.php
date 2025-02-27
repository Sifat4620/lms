<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Apply middleware to the controller's methods
     */


    /**
     * Show the student list view
     */
    public function index()
    {
        return view('Dashboard.main.student-list');
    }

    /**
     * Show the student profile view
     */
    public function profile()
    {
        // Debugging: Check the role of the authenticated user
        // Your normal logic for the profile
        return view('Dashboard.main.student-profile');
    }
}
