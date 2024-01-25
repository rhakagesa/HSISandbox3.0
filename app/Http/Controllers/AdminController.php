<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(){
        $data = [
            'title' => 'Admin Page',
            'role' => 'admin'
        ];

        return view('home', $data);
    }
}
