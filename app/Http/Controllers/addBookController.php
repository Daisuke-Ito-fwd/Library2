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
        $genre=DB::table('books_genre')->where('id', $request['genre'])->first();
        $publ=DB::table('books_publ')->where('id', $request['publ'])->first();
        $reqGet=$request->all();
        
        $user=Auth::user();
        return view('Lib.adminBook.addBookConf', ['reqGet'=>$reqGet, 'user'=>$user, 'genre'=>$genre, 'publ'=>$publ]);
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
        
        DB::table('library')->insert($insert);
        $id = DB::getPdo()->lastInsertId();
        $re = DB::table('library')
                ->select('title', 'kana', 'auth', 's_date',  'books_publ.publ as publ', 'books_genre.genre as genre', 'stock', 'isbn')
                ->join('books_publ','library.publ', '=', 'books_publ.id')
                ->join('books_genre', 'library.genre', '=', 'books_genre.id')
                ->where('library.id', $id)
                ->first();
        $user=Auth::user();
        return view('Lib.adminBook.finInsertBook',['user'=>$user, 'reqGet'=>$re ] );
        }
    
}
