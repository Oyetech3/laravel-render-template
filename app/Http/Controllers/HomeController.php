<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    function redirect() {
        $usertype = Auth::user()->usertype;
        if($usertype == 1) {
            return view('admin.index');
        }
        else {
            return view('home.userpage');
        }
    }
    function index() {
        return view('home.userpage');
    }

    function collections() {
        return view('home.usercollection');
    }
}
