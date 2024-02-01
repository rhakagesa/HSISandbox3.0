<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function login(Request $request){
        $formLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($formLogin)){
            if( Auth::check())
            {
                if(Auth::User()->role == 'admin') return view('/home', ['title' => 'Admin Page']);
                if(Auth::User()->role == 'cashier') return view('/home', ['title' => 'Cashier Page']);
            }
            else 
            {
                return redirect('/');
            } 
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
