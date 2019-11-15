<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\addBookRequest;
use Illuminate\Support\Facades\DB;
class addBookController extends Controller
{
    //registPage
    public function get(addBookRequest $request){
        $reqGet=$request->all();
        $user=Auth::user();
        return view('Lib.adminBook.addBookConf', ['reqGet'=>$reqGet, 'user'=>$user]);
    }

    //  confPage
    public function insert(Request $request){

        $userInput = $request->all();
            if($userInput['submit'] == 'ng') {
                // 編集ボタン
                return redirect()->route('reBook')->withInput($userInput);
            }
    
            $insert=[
                'id'       =>0,
                'title'    =>$userInput['title'],
                'kana'     =>$userInput['kana'],
                'auth'     =>$userInput['auth'],
                's_date'   =>$userInput['s_date'],
                'publ'     =>$userInput['publ'],
                'genre'    =>$userInput['genre'],
                'stock'    =>$userInput['stock'],
                'isbn'     =>$userInput['isbn'],
                'delet'    =>false,
            ];
        $request->session()->regenerateToken();
        DB::table('library')->insert($insert);
        $id = DB::getPdo()->lastInsertId();
        $re = DB::table('library')->where('id', $id)->first();
        $reqGet=(array)$re;
        $user=Auth::user();
        return view('Lib.adminBook.finInsertBook',['user'=>$user, 'reqGet'=>$reqGet] );
        }
    
}
