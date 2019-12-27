<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GraphData;
use Illuminate\Support\Facades\DB;


class ajaxGraphController extends Controller
{
    //
    public function post(){

        $graData=DB::table('graphdata')->get();
        return $graData;
    }    
}
