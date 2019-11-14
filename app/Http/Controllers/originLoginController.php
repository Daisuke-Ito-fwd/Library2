<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources;

class originLoginController extends Controller
{

    public function admin(){
        // $user=Auth::user();
        return view('Lib.adminTop');
    }
}

