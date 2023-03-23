<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user.index', compact('users'));
    }
    public function update(Request $request){
        $user=auth()->user()->password;
        $request->validate([
            'password_last'=>'required|min:5',
        ]);
        if(!Hash::check($request->password_last, $user)){
            return back()->with('password','Salah');
        }else{
            $validate=$request->validate([
                'password' => 'required|confirmed|min:6',
            ],[
                'password.required'=>'Wajib Di isi',
                'password.confirmed'=>'Password Confirm Tidak Sesuai',
                'password.min'=>'Min 5 digit',

            ]);

            User::find(auth()->user()->id)->update(['password' => Hash::make($validate['password'])]);
            return back()->with('success','Berhasil Merubah Data');
        }
    }
}
