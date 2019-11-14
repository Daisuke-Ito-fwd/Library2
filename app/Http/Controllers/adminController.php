<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources;

class AdminController extends Controller
{
    // to addUser
    public function addUser(){
        $user=Auth::user();
        return view("Lib.admin_user.addUser", ['user'=>$user]);
    }

    // to addBook
    public function addBook(){
        $user=Auth::user();
        return view("Lib.addBook", ['user'=>$user]);
    }

    // to searcUsers
    public function searchUsers(){
        $user=Auth::user();
        return view("Lib.searchUsers", ['user'=>$user]);
    }

    // to searchBooks
    public function searchBooks(){
        $user=Auth::user();
        return view("Lib.searchBooks", ['user'=>$user]);
    }
}
