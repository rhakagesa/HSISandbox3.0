<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
            if(Auth::User()->role == 'admin'){
                return redirect()->route('admin');
            }
            else if(Auth::User()->role == 'cashier'){
                return redirect()->route('cashier');
            } 
            else {
                echo "salah input";
            } 
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('');
    }
}
