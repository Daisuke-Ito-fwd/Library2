<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
        public function authenticate(Request $request)
        {
            /**
     * 認証を処理する
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
            // if (Auth::attempt(['email' => $email, 'password' => $password, 'disp_frag' => false])) {
                return redirect()->route('Route');
            }else{
                $result = $credentials;
                return redirect()->route('first')->withInput($result);
            }
        

        }
}
