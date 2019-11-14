<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources;

class AdminController extends Controller
{
    // go to addUser
    public function addUser(){
        $user=Auth::user();
        return view("Lib.adminUser.addUser", ['user'=>$user]);
    }

    // go to addBook
    public function addBook(){
        $user=Auth::user();
        return view("Lib.adminBook.addBook", ['user'=>$user]);
    }

    // go to searcUsers
    public function searchUsers(){
        $user=Auth::user();
        return view("Lib.searchUsers", ['user'=>$user]);
    }

    // go to searchBooks
    public function searchBooks(){
        $user=Auth::user();
        return view("Lib.searchBooks", ['user'=>$user]);
    }
}
