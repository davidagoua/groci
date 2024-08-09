@extends('admin.base')


@section('content')

    <h4 class="fw-bold py-3 mb-4 d-flex justify-content-between">
        <span class="text-muted fw-light">Utilisateurs </span>
        <div>
            <button class="btn btn-sm btn-primary" data-bs-target="#add-user-modal" data-bs-toggle="modal">Ajouter</button>&nbsp;&nbsp;
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

                </div>
            </div>
            <table class="table mt-2">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles }}</td>
                        <td class="d-flex">
                            <button class="btn btn-sm btn-secondary" data-bs-target="#add-user-{{ $user->id }}-modal" data-bs-toggle="modal">
                                <span class="bx bx-edit"></span>
                            </button> &nbsp;
                            <button class="btn btn-sm btn-danger" data-bs-target="#add-user-modal" data-bs-toggle="modal">
                                <span class="bx bx-trash"></span>
                            </button>
                            <div class="modal fade" id="add-user-{{ $user->id }}-modal">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="{{ route('boutique_admin.update_utilisateur') }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5>Ajouter un utilisateur</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="">Nom:</label>
                                                <input type="text" value="{{ $user->name ?? '' }}" required placeholder="Nom d'utilisateur" name="name" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Email:</label>
                                                <input type="email" value="{{ $user->email ?? '' }}" required placeholder="Email" name="email" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Mot de passe:</label>
                                                <input type="password" required placeholder="Mot de passe" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer text-right">
                                            <button class="btn  btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                @endforeach
            </table>
        </div>
    </div>
    <div class="modal fade" id="add-user-modal">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('boutique_admin.update_utilisateur') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5>Ajouter un utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Nom:</label>
                        <input type="text" required placeholder="Nom d'utilisateur" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Email:</label>
                        <input type="email" required placeholder="Email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Mot de passe:</label>
                        <input type="password" required placeholder="Mot de passe" name="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button class="btn  btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
