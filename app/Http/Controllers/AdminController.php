<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin panel home
    public function index()
    {
        return view('backend.home');
    }
}
