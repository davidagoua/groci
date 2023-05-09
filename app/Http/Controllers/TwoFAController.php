<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TwoFAController extends Controller
{
    /**
     * Write code on Method
     *
     */
    public function index()
    {
        return view('twofactor.index');
    }

    /**
     * Write code on Method
     *
     */
    public function store(Request $request)
    {
        if(auth()->user()->telephone == "" || auth()->user()->telephone == null){
            $request->validate([
                'contact' => 'required',
            ]);
            auth()->user()->contact = $request->input('contact');
            auth()->user()->save();
            auth()->user()->generateCode();
            return back()->with('success', 'Contact enregistré avec succès');
        }
        $request->validate([
            'code' => 'required',
        ]);

        $find = User::where('id', auth()->user()->id)
            ->where('otp', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(2))
            ->first();
        if (!is_null($find)) {
            $find->is_actif = true;
            $find->save();
            return redirect('/admin');
        }
        return back()->with('error', 'Vous avez entré un mauvais code.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function resend()
    {
        auth()->user()->generateCode();
        return back()->with('success', 'Le code a été envoyé.');
    }
}
