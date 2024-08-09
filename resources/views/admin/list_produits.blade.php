@extends('admin.base')


@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produits </span></h4>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <form action="" method="get" class=" input-group">
                        <input name="q" type="search" class="form-control">
                        <button class="btn btn-primary">
                            <span class="bx bx-search"></span>
                        </button>
                    </form>
                </div>
                <div>
                    <button class="btn btn-primary">
                        <span class="">Exporter</span>
                    </button>
                </div>
            </div>
            <table class="table mt-2">
                <tr>
                    <th>Code barre</th>
                    <th>Nom</th>
                    <th>Unité</th>
                    <th>Image</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
                @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->code_barre }}</td>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ $produit->unite }}</td>
                        <td><img src="{{public_path($produit->image()->path)}}" alt=""></td>
                        <td>{{ $produit->categorie->name }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
