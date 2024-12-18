<div>
    <script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">
    <section class="shop-list section-padding" style="background-color: #efefef">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-9 d-md-none ">
                    <a href="#"><img class="img-fluid mb-3" src="img/shop.jpg" alt=""></a>
                    <div class="shop-head">
                        <div class="btn-group float-right mt-2 ">
                            <a href="{{ route('front.shop.search') }}" class="btn btn-link text-dark ">
                                Effacer les filtres
                            </a>

                        </div>
                        <h5 class="mb-3"> Recherche des produits </h5>

                    </div>
                    @if(false)
                        <form method="get" class="row my-3">
                            <div class="col-4">
                                <input name="filter[nom]" type="text" placeholder="Rechercher un produit"
                                       wire:model="searchText"
                                       class="bg-white p-4 border-0 w-full rounded-0 form-control">
                            </div>
                            <div class="col-4">
                                <select name="" wire:change="updateLocalite" wire:model="localite"
                                        class="bg-white  border-0 w-full rounded-0 w-100 p-3" id="">
                                    <option value="Tous" selected>Toutes les villes</option>
                                    @foreach(
                                    $villes as $ville
                                    )
                                        <option value="{{ $ville }}">{{ $ville }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="sort" class="bg-white  border-0 w-full rounded-0 w-100 p-3" id="">
                                    <option value="prix" selected>Prix</option>
                                    <option value="nom">Nom</option>
                                    <option value="boutique_id">Boutique</option>
                                    <option value="categorie_id">Categorie</option>
                                </select>
                            </div>
                            <div class="col">
                                <button class="btn h-100 w-100 btn-dark rounded-0">
                                    <span class="mdi mdi-search"></span>
                                    <span>Rechercher</span>
                                </button>
                            </div>
                        </form>
                    @endif
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

                <div class="col-md-3">
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
                                            <div id="accordion">
                                                <div class="w-full">
                                                    <a class="w-full p-2 d-flex justify-content-between  d-block" style="background-color: #eeeeee" data-toggle="collapse" data-target="#collapse-categorie-{{ $cat->id }}">
                                                        <label class="">{{ $cat->name }}</label>
                                                        <span class="mdi mdi-chevron-down float-right"></span>
                                                    </a>

                                                </div>
                                                <div class="collapse @if($selectedGrandParent ===  $cat->id) show @endif" id="collapse-categorie-{{ $cat->id }}">
                                                    @foreach($cat->enfants as $scat)
                                                    <div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input wire:model="cats" value="{{ $scat->id }}" type="checkbox"
                                                                   class="custom-control-input" id="cb{{ $scat->id }}">
                                                            <label class="custom-control-label"
                                                                   for="cb{{ $scat->id }}">{{ $scat->name }}</label>
                                                        </div>
                                                        <div class="ml-3">
                                                            @foreach($scat->enfants as $sscat)
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="sous_sous_categorie_id" value="{{ $sscat->id }}" data-select-id="{{$selectedSousSousCategorie}}" data-current-categorie="{{$sscats}}" @if($selectedSousSousCategorie == $sscat->id) checked @endif type="checkbox"
                                                                           class="custom-control-input sous-sous-cat" id="cb{{ $sscat->id }}">
                                                                    <label class="custom-control-label"
                                                                           for="cb{{ $sscat->id }}">{{ $sscat->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @if(false)
                                            <div class="custom-control custom-checkbox">
                                                <input wire:model="cats" value="{{ $cat->id }}" type="checkbox"
                                                       class="custom-control-input" id="cb{{ $cat->id }}">
                                                <label class="custom-control-label"
                                                       for="cb{{ $cat->id }}">{{ $cat->name }}</label>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

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
                                            <select class="form-control" name="prixmin" wire:model="prixmin"
                                                    id="prixmin">
                                                @if($prixmax == null || $prixmax >0)
                                                    <option value="0">0</option>
                                                @endif
                                                @if($prixmax == null || $primax > 5000)
                                                    <option value="5000">5000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 10000)
                                                    <option value="10000">10000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 15000)
                                                    <option value="15000">15000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 20000)
                                                    <option value="20000">20000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 25000)
                                                    <option value="25000">25000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 30000)
                                                    <option value="30000">30000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 35000)
                                                    <option value="35000">35000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 40000)
                                                    <option value="40000">40000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 45000)
                                                    <option value="45000">45000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 50000)
                                                    <option value="50000">50000 FCFA</option>
                                                @endif
                                                @if($prixmax == null || $primax > 55000)
                                                    <option
                                                        value="55000">55000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 60000)
                                                    <option
                                                        value="60000">60000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 65000)
                                                    <option
                                                        value="65000">65000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 70000)
                                                    <option
                                                        value="70000">70000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 75000)
                                                    <option
                                                        value="75000">75000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 80000)
                                                    <option
                                                        value="80000">80000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 85000)
                                                    <option
                                                        value="85000">85000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 90000)
                                                    <option
                                                        value="90000">90000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 95000)
                                                    <option
                                                        value="95000">95000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 100000)
                                                    <option
                                                        value="100000">100000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 150000)
                                                    <option
                                                        value="150000">150000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 200000)
                                                    <option
                                                        value="200000">200000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 250000)
                                                    <option
                                                        value="250000">250000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 300000)
                                                    <option
                                                        value="300000">300000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 350000)
                                                    <option
                                                        value="350000">350000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 400000)
                                                    <option
                                                        value="400000">400000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 450000)
                                                    <option
                                                        value="450000">450000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 500000)
                                                    <option
                                                        value="500000">500000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 600000)
                                                    <option
                                                        value="600000">600000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 700000)
                                                    <option
                                                        value="700000">700000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 800000)
                                                    <option
                                                        value="800000">800000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 900000)
                                                    <option
                                                        value="900000">900000 FCFA
                                                    </option>
                                                @endif
                                                @if($prixmax == null || $primax > 1000000)
                                                    <option
                                                        value="1000000">1000000 FCFA
                                                    </option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Prix Maximum</label>
                                            <select class="form-control" name="prixmax" wire:model="prixmax"
                                                    id="prixmax">


                                                @if( $prixmin < 5000)
                                                    <option value="5000">5000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 10000)
                                                    <option value="10000">10000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 15000)
                                                    <option value="15000">15000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 20000)
                                                    <option value="20000">20000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 25000)
                                                    <option value="25000">25000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 30000)
                                                    <option value="30000">30000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 35000)
                                                    <option value="35000">35000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 40000)
                                                    <option value="40000">40000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 45000)
                                                    <option value="45000">45000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 50000)
                                                    <option value="50000">50000 FCFA</option>
                                                @endif
                                                @if( $prixmin < 55000)
                                                    <option
                                                        value="55000">55000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 60000)
                                                    <option
                                                        value="60000">60000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 65000)
                                                    <option
                                                        value="65000">65000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 70000)
                                                    <option
                                                        value="70000">70000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 75000)
                                                    <option
                                                        value="75000">75000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 80000)
                                                    <option
                                                        value="80000">80000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 85000)
                                                    <option
                                                        value="85000">85000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 90000)
                                                    <option
                                                        value="90000">90000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 95000)
                                                    <option
                                                        value="95000">95000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 100000)
                                                    <option
                                                        value="100000">100000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 150000)
                                                    <option
                                                        value="150000">150000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 200000)
                                                    <option
                                                        value="200000">200000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 250000)
                                                    <option
                                                        value="250000">250000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 300000)
                                                    <option
                                                        value="300000">300000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 350000)
                                                    <option
                                                        value="350000">350000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 400000)
                                                    <option
                                                        value="400000">400000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 450000)
                                                    <option
                                                        value="450000">450000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 500000)
                                                    <option
                                                        value="500000">500000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 600000)
                                                    <option
                                                        value="600000">600000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 700000)
                                                    <option
                                                        value="700000">700000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 800000)
                                                    <option
                                                        value="800000">800000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 900000)
                                                    <option
                                                        value="900000">900000 FCFA
                                                    </option>
                                                @endif
                                                @if( $prixmin < 1000000)
                                                    <option
                                                        value="1000000">1000000 FCFA
                                                    </option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                <input type="checkbox" wire:model="boutiques_filters"
                                                       value="{{ $bt->id }}" class="custom-control-input"
                                                       id="b{{ $bt->id }}">
                                                <label class="custom-control-label"
                                                       for="b{{ $bt->id }}">{{ $bt->nom }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="left-ad mt-4">

                            <section class="splide" aria-labelledby="carousel-heading">

                                <div class="splide__track">
                                    <ul class="splide__list">
                        @forelse($bannieres as $ban)
                                        <li class="splide__slide">
                                            <img class="img-fluid" src="{{ asset('/storage/'.$ban->image)  }}" alt="">
                                        </li>
                        @empty
                                    <li class="splide__slide">
                                        <img class="img-fluid" src="http://via.placeholder.com/254x557" alt="">
                                    </li>
                        @endforelse
                                    </ul>
                                </div>
                            </section>
                    </div>
                </div>

                <div class="col-md-9 d-sm-none d-md-block ">
                    <a href="#"><img class="img-fluid mb-3" src="img/shop.jpg" alt=""></a>
                    <div class="shop-head">
                        <div class="btn-group float-right mt-2 ">
                            <a href="{{ route('front.shop.search') }}" class="btn btn-link text-dark ">
                                Effacer les filtres
                            </a>

                        </div>
                        <h5 class="mb-3"> Recherche des produits </h5>

                    </div>
                    @if(false)
                        <form method="get" class="row my-3">
                            <div class="col-4">
                                <input name="filter[nom]" type="text" placeholder="Rechercher un produit"
                                       wire:model="searchText"
                                       class="bg-white p-4 border-0 w-full rounded-0 form-control">
                            </div>
                            <div class="col-4">
                                <select name="" wire:change="updateLocalite" wire:model="localite"
                                        class="bg-white  border-0 w-full rounded-0 w-100 p-3" id="">
                                    <option value="Tous" selected>Toutes les villes</option>
                                    @foreach(
                                        $villes as $ville
                                    )
                                        <option value="{{ $ville }}">{{ $ville }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="sort" class="bg-white  border-0 w-full rounded-0 w-100 p-3" id="">
                                    <option value="prix" selected>Prix</option>
                                    <option value="nom">Nom</option>
                                    <option value="boutique_id">Boutique</option>
                                    <option value="categorie_id">Categorie</option>
                                </select>
                            </div>
                            <div class="col">
                                <button class="btn h-100 w-100 btn-dark rounded-0">
                                    <span class="mdi mdi-search"></span>
                                    <span>Rechercher</span>
                                </button>
                            </div>
                        </form>
                    @endif
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
    <script>


        document.querySelectorAll('input[type="checkbox"].sous-sous-cat').forEach(checkbox => {
            console.log('found checkbox'+checkbox);
            checkbox.addEventListener('change', function() {
                console.log('found checkbox'+checkbox);
                if (this.checked) {
                    // Conserve les autres paramètres existants
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.set('sous_sous_categorie_id', this.value);
                    window.location.href = currentUrl.toString();
                }
            });
        });
    </script>
</div>
