<?php
//  Admin Access Pages
namespace App\Http\Controllers;
use App\Models\User;
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
        // Fetch users with the "student" role, eager load roles and permissions
        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');  // Filter by role name "student"
        })
        ->with(['roles', 'permissions']) // Eager load roles and permissions
        ->get();

        // Pass the students data to the view
        return view('Dashboard.main.student-list', compact('students'));
    }


    /**
     * Show the student profile view
     */
    public function profile()
    {
        // Fetch the authenticated user
        $student = auth()->user();

        // Get the borrowed books for the student
        $borrowedBooks = $student->borrowedBooks; // This will retrieve the books the user has borrowed

        return view('Dashboard.main.student-profile', compact('student', 'borrowedBooks'));
    }
}
