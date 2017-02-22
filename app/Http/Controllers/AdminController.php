<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class AdminController extends Controller
{
    public function ernings()
    {
        return view('admins.ernings');
    }
}
