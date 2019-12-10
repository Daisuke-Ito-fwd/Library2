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

        if($user['disp_flag'] == false){
            if($user['typ']==1){
                // for admin
            return view('Lib.adminTop', ['user'=>$user]);


            }elseif($user['typ']==2){
                // for general
            return view('Lib.adminUser.searchBooks', ['user'=>$user]);    


            }elseif($user['typ']==99){
                // this is SuperAdmin route
            // return view('*******************', ['user'=>$user]);
            }
        }else{
            // disp_fragがtrueの場合（ユーザー削除済み）強制ログアウト
            // 見かけ上はログイン失敗
            Auth::logout();
            $result =['email'=>$user->email] ;
            return redirect()->route('first')->withInput($result);
        }
    }
}

