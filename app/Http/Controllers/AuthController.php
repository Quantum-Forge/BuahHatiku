<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    //
    public static function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'nullable',
            'username' => 'required',
        ], [
            'required' => ':attribute harus diisi'
        ]);
        if ($validator->fails()) {
            return back()->withErrors([
                'error' => 'Username atau password tidak sesuai',
            ]);
        }
        // $remember_me = $request->has('remember_me') ? true : false ;
        $remember_me = true;
        $user  = User::where('Username' , $request->username )
                        ->where('StatusAktif', 1)
                        ->first();
        if($user){
            $password  = $request->password;
            if (Hash::check($password, $user->Password)) { 
                Auth::login($user, $remember = $remember_me);
                if($user->Role == 3){
                    return redirect('/daftar_absensi_terapis');
                } 
                return redirect('dashboard');
            }
        }
        
        return back()->withErrors([
            'error' => 'Username atau password tidak sesuai',
        ]);
    }

    public static function logout(){
        Auth::logout();
        return redirect('login');
    }
}
