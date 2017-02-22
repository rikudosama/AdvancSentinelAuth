<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class ManagerController extends Controller
{
    public function tasks()
    {
        return view('managers.tasks');
    }
}
