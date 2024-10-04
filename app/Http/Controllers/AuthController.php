<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{



    public function login(Request $request)
    {


        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ],[
            'username.required'=>'Email é obrigatório',
            'password.required'=>'Password é obrigatória',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->id_tipo == 1)
            {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors([
            'Email ou senha errados'
        ]);

    

    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }




}
