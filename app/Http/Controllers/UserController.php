<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    //
    public static function insert(Request $request)
    {
        // Validate the request...
        $validated = $request->validate([
            'NoIdentitas' => 'required|unique:users|max:16',
            'Role' => 'required',
            'Nama' => 'required',
            'Alamat' => 'required',
            'NoHP' => 'required|numeric',
            'Username' => 'required',
            'Password' => 'required',
            'Email' => 'required|email',
        ]);

        dd($validated);

        if($validated){
            $user = new User;
 
            $user->NoIdentitas = $request->NoIdentitas;
            $user->Role = $request->Role;
            $user->Nama = $request->Nama;
            $user->Alamat = $request->Alamat;
            $user->NoHP = $request->NoHP;
            $user->Username = $request->Username;
            $user->Password = Hash::make($request->Password);
            $user->Email = $request->Email;
            $user->StatusAktif = 1;
    
            $user->save();
            return redirect('dashboard');
        }
        return back()->withErrors([
            'error' => 'Email atau password tidak sesuai',
        ]);
        
    }
}
