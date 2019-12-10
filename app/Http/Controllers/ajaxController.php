<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
    //ajaxリクエストに応える部分
    public function index(Request $request)
    {
        if (($request['name2'] == "") && ($request['name1'] == "") && ($request['kana2'] == "") && ($request['kana1'] == "") && ($request['email'] == "") && ($request['typ']) == "") {
            $res = User::select('users.id', 'name2', 'name1', 'kana2', 'kana1', 'email', 'user_typ.typ', 'created_at')
                ->where('disp_flag', false)
                ->leftjoin('user_typ', 'users.typ', '=', 'user_typ.id')
                ->get();
        } else {
            // スコープを利用する
            $res = User::select('users.id', 'name2', 'name1', 'kana2', 'kana1', 'email', 'user_typ.typ', 'created_at')
                ->kana2like($request->kana2)
                ->kana1like($request->kana1)
                ->name2like($request->name2)
                ->name1like($request->name1)
                ->maillike($request->email)
                ->typ($request->typ)
                ->disp()
                ->leftjoin('user_typ', 'users.typ', '=', 'user_typ.id')
                ->get();

        }
        // return response()->json(['res'=>$res]);
        return $res;
    }

    public function delete(Request $request)
    {
        // $req=json_decode($request, true);
        // $error=  json_last_error();
        // foreach($req as $key){
            $req = explode(',', $_POST['id']);
            foreach($req as $key){
                $id = User::where('id', '=', $key)->first();
                $id->disp_flag = true;
                $id->save();
            }
    }

    public function update(Request $request)
    {
        $person = User::where('id', '=', $request['id'])->first();
        $form = $request->all();
        unset($form['_token']); //????
        $person->fill($form)->save();
    }

    public function email(Request $request)
    {
        $res = User::where('email', $request->email)->count();

        return $res;
    }
}
