<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{
    //
    public function index(){
        $data = [
            'title' => 'Cashier Page',
            'role' => 'cashier'
        ];
        return view('home', $data);
    }
}
