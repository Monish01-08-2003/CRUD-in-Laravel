<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    function welcome()
    {
        return view('welcome');
    }
}
