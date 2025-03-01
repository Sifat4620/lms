<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index() // Define a method for handling requests
    {
        return view('Dashboard.main.page-invoice'); 
    }
}
