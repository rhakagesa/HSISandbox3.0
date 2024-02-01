<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $title = "Admin Page";
        $userData = User::all();

        return view('admin/master/user/user', [
            'title' => $title,
            'userData' => $userData]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        
        return redirect('/user')->with('success', 'Created data success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where('id',$id)->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        
        return redirect('/user')->with('success', 'Data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);

        if(!$user){
            return redirect('/user')->with('error', 'User not found');            
        } 
        else {
            $user->delete();
            return redirect('/user')->with('success', 'User has been remove');            
        }
    }
}
