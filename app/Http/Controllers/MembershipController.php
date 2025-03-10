<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use Auth;
use App\Models\MembershipRecord;
use Bavix\Wallet\Facades\Wallet;


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

        // Check if the user has enough balance
        if ($user->balance < $membership->price) {
            return back()->with('error', 'Insufficient balance. Please deposit funds.');
        }

        // Deduct balance from the user's wallet
        $user->withdraw($membership->price);

        // Set membership start and end date (1-month validity)
        $startDate = now();
        $endDate = $startDate->copy()->addMonth();

        // Save membership record
        MembershipRecord::create([
            'user_id' => $user->id,
            'membership_id' => $membership->id,
            'amount_paid' => $membership->price,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'is_active' => true,
        ]);

        // Update user's membership
        $user->membership_id = $membership->id;
        $user->save();

        return redirect()->back()->with('success', 'Membership upgraded successfully!');
    }
     
    
}
