<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class deleteUserController extends Controller
{
    //
    public function get(Request $request){
        $deleteUsers=$request->all();
        return view('Lib.adminUser.deleteUser', ['deleteUsers'=>$deleteUsers]);
    }
}
