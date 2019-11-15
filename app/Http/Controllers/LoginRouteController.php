<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources;
use Illuminate\Support\Facades\DB;

class LoginRouteController extends Controller
{

    public function admin(){
        // 承認ユーザー情報を取得
        $user=Auth::user();

       

        // typ 項目に従ってルート分岐
        if($user['typ']==1){
            // for admin
        return view('Lib.adminTop', ['user'=>$user]);


        }elseif($user['typ']==2){
            // for general
        return view('Lib.*******', ['user'=>$user]);    


        }elseif($user['typ']==99){
            // this is SuperAdmin route
        // return view('*******************', ['user'=>$user]);
        }
    }
}

