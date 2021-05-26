<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function adminArea()
    {
        return view('admin');
    }
}
