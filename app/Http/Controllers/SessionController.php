<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('sesi.login');
    }

    // function login(Request $request){
    //     $infologin =
    //     [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];
    //     // dd (Auth::attempt($infologin));
    //     if (Auth::attempt($infologin)) {
    //         return redirect('dashboard');
    //         $$request::flash("Login Berhasil");
    //     } else {
    //         return redirect('login');
    //         $$request::flash("Mohon isi data terlebih dahulu dengan benar dan lengkap!");
    //     }

    // }


    // DESY: FUNCTION ALERT LOGIN FIXED
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // kalau login berhasil, muncul alert success kemudian pengguna di arahkan ke halaman dashboard
            Session::flash('successLogin', 'Anda telah berhasil log in!');
            return redirect()->intended('/dashboard');
        } else {
            // tapi kalau login gagal, tampilkan pesan alert melalui session flash message
            Session::flash('alert', 'Mohon isi data terlebih dahulu dengan benar dan lengkap!');
            return redirect()->back(); // terus redirect kembali ke halaman login
        }
    }
    // END FUNCTION ALERT LOGIN FIXED


    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
