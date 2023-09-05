<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public static function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember_me = $request->has('remember_me') ? true : false ;
        $user  = User::where('Email' , $request->email )
                        ->where('StatusAktif', 1)
                        ->first();
        if($user){
            $password  = $request->password;
            if (Hash::check($password, $user->Password)) { 
                Auth::login($user, $remember = $remember_me);
                return redirect('dashboard');
            }
        }
        
        return back()->withErrors([
            'error' => 'Email atau password tidak sesuai',
        ]);
    }

    public static function logout(){
        Auth::logout();
        return redirect('login');
    }
}
