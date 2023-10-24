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
            // kalau login berhasil, arahkan pengguna ke halaman dashboard
            return redirect()->intended('/dashboard')->with('success', 'BERHASIL LOG IN');
        } else {
            // tapi kalau login gagal, tampilkan pesan alert melalui session flash message
            Session::flash('alert', 'Mohon isi data terlebih dahulu dengan benar dan lengkap!');
            return redirect()->back(); // terus redirect kembali ke halaman login
        }
        //INI NANTI BUAT KONDISI ROLE
            // $id_user = Auth::id();

            // if($id_user) {
            //     $module = $request->input('module', false);
            //     $action = $request->input('action', false);
            //     $mode = $request->input('mode', false);
            // }else {
            //     return redirect('login');
            // }
        //END KONDISI ROLE
    }
    // END FUNCTION ALERT LOGIN FIXED


    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
