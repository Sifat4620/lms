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
        // Fetch the authenticated student
        $student = auth()->user();
    
        // Get the borrowed books for the student
        $borrowedBooks = $student->borrowedBooks;
        $memberships = \App\Models\Membership::all();
    
        // Initialize fine calculation
        $fineAmount = 0;
    
        foreach ($borrowedBooks as $book) {
            $borrowedDate = \Carbon\Carbon::parse($book->pivot->borrowed_at);
            $dueDate = $borrowedDate->copy()->addDays(15); // Ensures due_date is exactly 15 days from borrowed_at
            $today = now();
            
            // Check if overdue
            if ($today->greaterThan($dueDate)) {
                $daysOverdue = $dueDate->diffInDays($today);
                $fineAmount += $daysOverdue * 50; // 50 Tk per day fine
            }
        }
    
        return view('Dashboard.main.student-profile', compact('student', 'borrowedBooks', 'memberships', 'fineAmount'));
    }
    
}
