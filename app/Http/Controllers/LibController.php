<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LibController extends Controller
{
    // Laravel
    public function login(){
        return view("auth.login");
    }
    // origin
    public function index(){
        // return view("Lib.index");
        return view("auth.login");
    }

    
}
