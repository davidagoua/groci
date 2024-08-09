@extends('admin.base')


@section('content')

    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between">
        <span class="text-muted fw-light">Propositions </span>
        <div>
            <button class="btn btn-sm btn-primary">Ajouter</button>&nbsp;&nbsp;
            <button class="btn btn-sm btn-primary">Importer</button>
        </div>
    </h4>
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
                <div class="d-flex">
                    <div class="dropdown">
                        <button data-bs-toggle="dropdown" class="btn dropdown-toggle  btn-sm btn-outline-primary">
                            <span class="bx bx-filter"></span>
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-item">
                                <label for="">Boutique</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    @foreach($boutiques as $boutique)
                                        <option value="{{ $boutique->id }}">{{ $boutique->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>&nbsp;

                    <button class="btn btn-sm btn-outline-primary">
                        <span class="">Exporter</span>
                    </button>
                </div>
            </div>
            <table class="table mt-2">
                <tr>
                    <th>Code barre</th>
                    <th>Produit</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Boutique</th>
                    <th>Disponible</th>
                    <th>Actions</th>
                </tr>
                @foreach($propositions as $proposition)
                    <tr>
                        <td>{{ $proposition->produit->code_barre }}</td>
                        <td>{{ $proposition->produit->nom }}</td>
                        <td>{{ $proposition->produit->categorie->name }}</td>
                        <td>{{ $proposition->prix }} FCFA</td>
                        <td>{{ $proposition->boutique->nom }}</td>
                        <td>
                            <input type="checkbox" @checked($proposition->is_actif)>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
