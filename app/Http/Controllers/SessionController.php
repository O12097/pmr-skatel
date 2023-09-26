<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view('sesi.login');
    }

    function login(Request $request){
        $infologin =
        [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd (Auth::attempt($infologin));
        if (Auth::attempt($infologin)) {
            return redirect('dashboard');
        } else {
            return redirect('login');
        }
        
    }

    function logout(){
        Auth::logout();
        return redirect('login');
    }

}
