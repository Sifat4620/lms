<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use Auth;

class MembershipController extends Controller
{
    /**
     * Show the student's profile with membership and borrowed books.
     */
    public function profile()
    {
        // Fetch the authenticated user
        $student = Auth::user();

        // Get the borrowed books for the student
        $borrowedBooks = $student->borrowedBooks;

        // Fetch all available memberships (for the upgrade modal)
        $memberships = Membership::all();

        return view('Dashboard.main.student-profile', compact('student', 'borrowedBooks', 'memberships'));
    }

    /**
     * Handle membership upgrade.
     */
    public function upgrade(Request $request)
    {
        $user = Auth::user();
        $membership = Membership::find($request->membership_id);

        if (!$membership) {
            return back()->with('error', 'Invalid membership plan.');
        }

        // Update user's membership
        $user->membership_id = $membership->id;
        $user->save();

        return redirect()->back()->with('success', 'Membership upgraded successfully!');
    }
}
