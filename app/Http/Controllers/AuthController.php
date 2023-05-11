<?php

namespace App\Http\Controllers;

use App\Actions\SendSms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

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
        if(auth()->user()->hasRole('GERANT_BOUTIQUE')){
            return redirect('/admin');
        }
        return redirect()->route('front.home');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required',
            'name'=>'required',
            'telephone'=>'required'
        ]);

        $user = new User();

        if($request->input('is_boutique')){
            $user->assignRole('GERANT_BOUTIQUE');
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->telephone = $data['telephone'];
        $user->password = Hash::make($data['password']) ;
        $user->is_actif = false;
        $user->save();
        $user->generateCode();

        auth()->login($user);
        if($user->hasRole('GERANT_BOUTIQUE')){
            return redirect('/admin');
        }
        return back()->with('success', "Bienvenue sur notre site !");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('front.home');
    }
}
