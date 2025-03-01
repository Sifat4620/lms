<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Bavix\Wallet\Facades\Wallet;

class WalletController extends Controller
{
    /**
     * Handle user deposit request.
     */
    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $user->deposit($request->amount);

        return redirect()->back()->with('success', 'Funds added successfully!');
    }
}
