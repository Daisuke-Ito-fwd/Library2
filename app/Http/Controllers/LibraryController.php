<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;
class LibraryController extends Controller
{
    //
    public function index(Request $request){
        $items= Library::all();
    }
}
