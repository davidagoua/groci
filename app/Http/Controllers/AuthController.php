<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(! auth()->attempt($data)){
            return back()->with('danger', "Email ou Mot de passe incorrecte !");
        }
        return back();
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required',
            'name'=>'required'
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']) ;
        $user->save();
        return back()->with('success', "Bienvenue sur notre site !");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
