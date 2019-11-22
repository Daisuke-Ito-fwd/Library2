<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\searchUserRequest;
use App\Http\Requests\editRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ajaxController extends Controller
{
    //ajaxリクエストに応える部分
    public function index(Request $request){
        if(($request['name2']=="") && ($request['name1'] == "") && ($request['kana2'] == "") && ($request['kana1'] == "") && ($request['mail'] == "") && ($request['typ']) == "")
        {
            $res=User::where('disp_flag', false)->get();
        }else{
            // スコープを利用する
            $res=User::kana2like($request->kana2)
                        ->kana1like($request->kana1)
                        ->name2like($request->name2)
                        ->name1like($request->name1)
                        ->maillike($request->mail)
                        ->typ($request->typ)
                        ->disp()
                        ->get();

    }
    return response()->json(['res'=>$res]);
}
}