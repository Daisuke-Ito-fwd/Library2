<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // go to addUser
    public function addUser(){
        $user=Auth::user();
        return view("Lib.adminUser.addUser", ['user'=>$user]);
    }

    // go to addBook
    public function addBook(){
        $genre=DB::select('select id, genre from books_genre order by id asc');
        $publ=DB::select('select id, publ from books_publ order by id asc');
        $user=Auth::user();
        return view("Lib.adminBook.addBook", ['user'=>$user, 'genre'=>$genre, 'publ'=>$publ]);
    }

    // go to searchUsers
    public function searchUsers(){
        $user=Auth::user();
        return view("Lib.adminUser.ajaxSearchUsers", ['user'=>$user]);
    }

    // go to searchBooks
    public function searchBooks(){
        $user=Auth::user();
        return view("Lib.searchBooks", ['user'=>$user]);
    }
}
