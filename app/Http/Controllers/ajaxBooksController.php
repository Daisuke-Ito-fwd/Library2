<?php

namespace App\Http\Controllers;
use App\Http\Controllers\LibraryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Library;

class ajaxBooksController extends Controller
{
    //
    public function index(Request $request){
       
       if(($request['title']=='') && ($request['kana']=='') && ($request['auth']=='') && ($request['publ']=='') && ($request['isbn']=='') && ($request['genre']=='')){ 
        $res = DB::table('library')
             ->select('library.id', 'title', 'kana', 'books_publ.publ', 'books_genre.genre', 'auth', 'isbn', 's_date', 'stock')
             ->where('delet', false)
             ->leftjoin('books_publ', 'library.publ', '=', 'books_publ.id')
             ->leftjoin('books_genre', 'library.genre', '=', 'books_genre.id')
             ->get();
       }else{
        $res = DB::table('library')
        ->select('library.id', 'title', 'kana', 'books_publ.publ', 'books_genre.genre', 'auth', 'isbn', 's_date', 'stock')
        ->where('title', 'like', '%'.$request['title'].'%')
        ->where('kana', 'like', '%'.$request['kana'].'%')
        ->where('auth', 'like', '%'.$request['auth'].'%')
        ->where('library.publ', 'like', '%'.$request['publ'].'%')
        ->where('library.genre', 'like', '%'.$request['genre'].'%')
        ->where('isbn', 'like', '%'.$request['isbn'].'%')
        ->where('delet', false)
        ->leftjoin('books_publ', 'library.publ', '=', 'books_publ.id')
        ->leftjoin('books_genre', 'library.genre', '=', 'books_genre.id')
        ->get();
       }
        return $res;
    }

    public function delete(Request $request){
        $param=['delet'=>true];
            DB::table('library')
            ->where('id', '=', $request->id)
            ->update($param);
    }

    public function update(Request $request){
        $params=[];
        foreach($_REQUEST as $key => $value){
            $params += array("$key"=>$value);
        }

        DB::table('library')
        ->where('id', '=', $request->id)
        ->update($params);
    }

    public function genre(){
        $res = DB::table('books_genre')
                ->select('id','genre')
                ->orderBy('id', 'asc')
                ->get();

        return $res;
    }
}
