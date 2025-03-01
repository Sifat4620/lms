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
        // Fetch students with the "student" role, including memberships and borrowed books
        $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'student');
            })
            ->with(['roles', 'permissions', 'membership', 'borrowedBooks' => function ($query) {
                $query->withPivot('borrowed_at', 'due_date');
            }])
            ->get();

        // Process student data for membership, borrowed books, and fine calculations
        foreach ($students as $student) {
            // Determine membership status
            $student->membership_status = $student->membership ? $student->membership->name : 'No Membership';

            // Count borrowed books
            $student->borrowed_books_count = $student->borrowedBooks->count();

            // Calculate total fine
            $student->total_fine = 0;
            foreach ($student->borrowedBooks as $book) {
                $borrowedDate = \Carbon\Carbon::parse($book->pivot->borrowed_at);
                $dueDate = $borrowedDate->copy()->addDays(15); // Ensures due date is 15 days from borrowed_at
                $today = now();

                if ($today->greaterThan($dueDate)) {
                    $daysOverdue = $dueDate->diffInDays($today);
                    $student->total_fine += $daysOverdue * 50; // 50 Tk per day fine
                }
            }
        }

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
