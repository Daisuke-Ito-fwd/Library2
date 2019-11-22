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
class searchUserController extends Controller
{
    //
    public function get(searchUserRequest $request){
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
        $userInput=$request->all();
        $result=$res;
        $user=Auth::user();
        session(['url'=>url()->full()]);

        return view('Lib.adminUser.searchUsers', ['result' => $result, 'user'=>$user, 'userInput'=>$userInput]);
    }

    //それぞれの編集用ぺージへ
    public function edit(Request $request){
        $ed=DB::table('users')->where('id', $request->id)->first();
        $edUser=(array)$ed;
        $user=Auth::user();
        return view('Lib.adminUser.addUser',['edUser'=>$edUser, 'user'=>$user]);
    }

    // 編集後確認画面へ
    public function editConf(editRequest $request){
        $userInput = $request->all();
        $user=Auth::user();
        return view('Lib.adminUser.addUserConf', ['userInput'=>$userInput, 'user'=>$user]);
    }

// update
    public function editFin(Request $request){
        
        $userInput = $request->all();
        if($userInput['submit'] == 'back') {
            // 編集ボタン
            return redirect("lib/edit?id=".$request->id)->withInput($userInput);
        }

        $forUpdate=[
            'name2'    =>$userInput['name2'],
            'name1'    =>$userInput['name1'],
            'kana2'    =>$userInput['kana2'],
            'kana1'    =>$userInput['kana1'],
            'email'    =>$userInput['mail'],
            'typ'      =>$userInput['typ'],
            'disp_flag'=>false,
            'updated_at'=>now(),
        ];
        if($userInput['pass']==""){
        }else{
            $forUpdate['password']=Hash::make($userInput['pass']);
        }

        $request->session()->regenerateToken();
        DB::table('users')->where('id', $userInput['id'])->update($forUpdate);

        // 更新ID取得
        $re = DB::table('users')->where('id', $userInput['id'])->first();
        $abtUser=(array)$re;
        $logUser=Auth::user();
        $url=session('url');
        return view('Lib.adminUser.finUpdateUser',['abtUser'=>$abtUser, 'user'=>$logUser, 'url'=>$url] );
    }

    // public function index(){
    //     return view('Lib.adminUser.ajaxSearchUsers');
    // }
}
