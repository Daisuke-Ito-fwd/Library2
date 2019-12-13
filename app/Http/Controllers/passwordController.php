<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class passwordController extends Controller
{
    //
    public function reset(){
        return view('auth/passwords/reset');
    }
}
