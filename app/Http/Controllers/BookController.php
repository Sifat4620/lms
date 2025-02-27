<?php

namespace App\Http\Controllers;

use App\Traits\ChecksPermission;
use Illuminate\Http\Request;

class BookController extends Controller
{

    use ChecksPermission;


    public function showFormValidation()
    {
        return view('Dashboard.main.form-validation');
    }
}
