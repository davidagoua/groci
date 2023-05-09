<div>
    <section class="shop-list section-padding" style="background-color: #efefef">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2">
                    <div class="shop-filters">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                            Categories <span class="mdi mdi-chevron-down float-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#accordion">
                                    <div class="card-body card-shop-filters">

                                        @foreach($categories as $cat)
                                        <div class="custom-control custom-checkbox">
                                            <input wire:model="cats" value="{{ $cat->id }}" type="checkbox" class="custom-control-input" id="cb{{ $cat->id }}">
                                            <label class="custom-control-label" for="cb{{ $cat->id }}">{{ $cat->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @if(false)
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                            Prix <span class="mdi mdi-chevron-down float-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                     data-parent="#accordion">
                                    <div class="card-body card-shop-filters">
                                        <div class="mb-3">
                                            <label for="">Prix Minimum</label>
                                            <select class="form-control" name="prixmin" wire:model="prixmin" id="prixmin">
                                                @if($prixmax == null || $prixmax >0)<option value="0">0</option>@endif
                                                @if($prixmax == null || $prixmax >500)<option value="500">500</option>@endif
                                                @if($prixmax == null || $prixmax >5000)<option value="5000">5000</option>@endif
                                                @if($prixmax == null || $prixmax >10000)<option value="10000">10000</option>@endif
                                                @if($prixmax == null || $prixmax >25000)<option value="25000">25000</option>@endif
                                                @if($prixmax == null || $prixmax >50000)<option value="50000">50000</option>@endif
                                                @if($prixmax == null || $prixmax >100000)<option value="100000">100000</option>@endif
                                                @if($prixmax == null || $prixmax >1000000)<option value="1000000">1000000</option>@endif
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Prix Maximum</label>
                                            <select class="form-control" name="prixmax" wire:model="prixmax" id="prixmax">
                                                @if($prixmin < 500)<option value="500">500</option>@endif

                                                @for($p = 5; $p <= 10; $p+2)

                                                    @if($prixmin < $p)<option value="{{$p}}">{{$p}}</option>@endif
                                                @endfor

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                            Boutiques <span class="mdi mdi-chevron-down float-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                     data-parent="#accordion">
                                    <div class="card-body card-shop-filters">

                                        @foreach($boutiques as $bt)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" wire:model="boutiques_filters" value="{{ $bt->id }}" class="custom-control-input" id="b{{ $bt->id }}">
                                            <label class="custom-control-label" for="b{{ $bt->id }}">{{ $bt->nom }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="left-ad mt-4">
                        <img class="img-fluid" src="http://via.placeholder.com/254x557" alt="">
                    </div>
                </div>

                <div class="col-md-10">
                    <a href="#"><img class="img-fluid mb-3" src="img/shop.jpg" alt=""></a>
                    <div class="shop-head">
                        <div class="btn-group float-right mt-2 ">
                            <a href="{{ route('front.shop.search') }}" class="btn btn-link text-dark " >
                                Effacer les filtres
                            </a>

                        </div>
                        <h5 class="mb-3"> Recherche des produits </h5>

                    </div>
                    <form method="get" class="row my-3">
                        <div class="col-4">
                            <input name="filter[nom]" type="text" placeholder="Rechercher un produit" wire:model="searchText" class="bg-white p-4 border-0 w-full rounded-0 form-control">
                        </div>
                        <div class="col-4">
                            <select name="" class="bg-white p-4 border-0 w-full rounded-0 form-control" id="">
                                <option value="Tous" selected>Toutes les villes</option>
                                @foreach(
                                $villes as $ville
                                )
                                    <option value="{{ $ville }}">{{ $ville }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <select name="sort" class="bg-white p-4 border-0 w-full rounded-0 form-control" id="">
                                <option value="prix" selected>Prix</option>
                                <option value="nom" >Nom</option>
                                <option value="boutique_id" >Boutique</option>
                                <option value="categorie_id" >Categorie</option>
                            </select>
                        </div>
                        <div class="col">
                            <button class="btn h-100 w-100 btn-dark rounded-0">
                                <span class="mdi mdi-search"></span>
                                <span>Rechercher</span>
                            </button>
                        </div>
                    </form>
                    <div class="row">
                        @foreach($produits as $p)
                            <div class="col-md-3 mb-3">
                                <x-product-card :produit="$p"/>
                            </div>
                        @endforeach

                    </div>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item ">
                                <span class="">
                                {{ $produits->links() }}
                                </span>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
