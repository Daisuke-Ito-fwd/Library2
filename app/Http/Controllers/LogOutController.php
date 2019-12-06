<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogOutController extends Controller
{
    //
    public function logout(Request $request){
        $actlog = new \App\Http\Middleware\ActlogMiddleware;
        $actlog -> actlog($request, 999);

        Auth::logout();
        return redirect()->route('first');
    }
}
