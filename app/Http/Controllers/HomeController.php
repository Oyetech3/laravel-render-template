<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function redirect() {
        return view('home.userpage');
    }
    function index() {
        return view('home.userpage');
    }

    function collections() {
        return view('home.usercollection');
    }
}
