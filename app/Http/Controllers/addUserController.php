<?php

namespace App\Http\Controllers;
// namespace App\Http\Requests;
use AppContact;
use App\User;
use App\Http\Requests\addUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\SendTestMail;
class addUserController extends Controller
{
    //  registPage
    public function post(addUserRequest $request){
        $reqPost=$request->all();
        $user=Auth::user();
        return view('Lib.adminUser.addUserConf',['reqPost'=>$reqPost, 'user'=>$user]);
    }

    //  confPage
    public function insert(Request $request){

        $userInput = $request->all();
        if($userInput['submit'] == 'back') {
            // 編集ボタン
            return redirect()->route('re')->withInput($userInput);
        }

        $insert=[
            'id'       =>0,
            'name2'    =>$userInput['name2'],
            'name1'    =>$userInput['name1'],
            'kana2'    =>$userInput['kana2'],
            'kana1'    =>$userInput['kana1'],
            'email'    =>$userInput['email'],
            'password' =>$userInput['pass'],
            'typ'      =>$userInput['typ'],
            'disp_flag'=>false,
        ];
        $request->session()->regenerateToken();
            User::create([
            'typ'  =>  $insert['typ'],
            'name2' => $insert['name2'],
            'name1' => $insert['name1'],
            'kana2' => $insert['kana2'],
            'kana1' => $insert['kana1'],
            'email' => $insert['email'],
            'disp_flag' => $insert['disp_flag'],
            'password' => Hash::make($insert['password']),
        ]);

        // lastInsertID取得
        $id = DB::getPdo()->lastInsertId();
        $re = DB::table('users')->where('id', $id)->first();
        $user=(array)$re;
        $logUser=Auth::user();

        $userMail = [
            [
                'email' => $user['email'], 
                'name2' => $user['name2'],
                'name1' => $user['name1'],
                'kana2' => $user['kana2'],
                'kana1' => $user['kana1'],
                'typ' => $user['typ'],

            ]
        ];
    
        Mail::to($userMail)->send(new SendTestMail($userMail));

        return view('Lib.adminUser.finInsertUser',['abtUser'=>$user, 'user'=>$logUser] );
    }
    

}
