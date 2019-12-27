<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class graphController extends Controller
{
    //
    public function index(){
        return view('lib.graph');
    }
}
