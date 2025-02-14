<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Method to show the report list view
    public function index()
    {
        // You can pass data here if needed, for now just return the view
        return view('Dashboard.main.report-list');
    }
}
