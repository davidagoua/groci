<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Produit;
use App\Models\Proposition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BoutiqueAdmin extends Controller
{
    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    public function list_produits(Request $request)
    {
        $produits = Produit::query();

        if ($request->filled('q')) {
            $produits->where('nom', 'like', '%' . strtolower($request->get('q')) . '%');
        }

        return view('admin.list_produits', [
            'produits' => $produits->get()
        ]);
    }

    public function list_propositions(Request $request)
    {
        $boutiques = Auth::user()->boutiques();
        $propositions = Proposition::query()
            ->whereIn('boutique_id', $boutiques->pluck('id'));

        if ($request->filled('q')) {
            $propositions->whereHas('produit', function ($builder) use ($request) {
                $builder->whereRaw("lower(nom) like '%" . strtolower($request->get('q')) . "%'");
            });
        }

        return view('admin.list_propositions', [
            'propositions' => $propositions->get()->forPage($request->page ?? 1, $request->perPage ?? 25),
            'boutiques' => $boutiques
        ]);
    }

    public function list_utilisateurs(Request $request)
    {
        $boutiques = Auth::user()->boutiques();
        $users = User::query()
            ->where('owner_id', auth()->id());

        if ($request->filled('q')) {
            $users->whereRaw("lower(name) like '%" . $request->get('q') . "%'");
        }

        return view('admin.list_utilisateurs', [
            'users' => $users->get(),
            'boutiques' => $boutiques
        ]);
    }

    public function update_utilisateur(Request $request, ?User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $user = $user ?? new User();
        $user->owner_id = auth()->id();
        //$user->boutiques()->saveManyQuietly(auth()->user()->boutiques);
        $user->password = Hash::make($request->input('password'));
        $user->fill($data)->save();

        return back()->with('success', 'Utilisateur enrégistré');
    }
}
