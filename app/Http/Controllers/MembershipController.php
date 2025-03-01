<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;
use Auth;
use App\Models\MembershipRecord;


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

        // Check if the user already has an active membership
        $existingRecord = MembershipRecord::where('user_id', $user->id)
                                        ->where('is_active', true)
                                        ->latest('end_date')
                                        ->first();

        if ($existingRecord && Carbon::now()->lessThan($existingRecord->end_date)) {
            // If the user upgrades before expiry, extend the current end_date by 1 month
            $startDate = $existingRecord->end_date;
            $endDate = $startDate->copy()->addMonth();
        } else {
            // New membership or expired membership
            $startDate = Carbon::now();
            $endDate = $startDate->copy()->addMonth();
        }

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

        return redirect()->back()->with('success', 'Membership upgraded successfully! Valid until ' . $endDate->format('d-m-Y'));
    }
}
