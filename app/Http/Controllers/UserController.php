<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $title = "User Page";
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
        Alert::success('User Created', 'creating user success!');
        return redirect('/user');
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
        
        Alert::success('User Updated', 'updating user success!');
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);

        if(!$user){
            Alert::warning('User Not Found', 'user not found!');
            return redirect('/user');            
        } 
        else {
            $user->delete();
            Alert::success('User Removed', 'removing user success!');
            return redirect('/user');            
        }
    }


    //Profile
    public function profile(){
        $title = "Profile Page";
        $user = Auth::User();
        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];

        return view('profile', [
            'title' => $title,
            'userData' => $userData]);
    }

    public function updateprofile(Request $request, string $id)
    {
        User::where('id',$id)->where('id',$id)->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Alert::success('User Updated', 'updating user success!');
        return redirect('/profile');
    }
}
