<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show the form validation view
    public function showFormValidation()
    {
        return view('Dashboard.main.form-validation');
    }
}
