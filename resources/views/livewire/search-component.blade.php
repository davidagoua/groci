<div>
    <section class="shop-list section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="shop-filters">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                            Categorie <span class="mdi mdi-chevron-down float-right"></span>
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
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                     data-parent="#accordion">
                                    <div class="card-body card-shop-filters">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" name="price_range" wire:modal="price_range" value="100,5000" class="custom-control-input" id="1">
                                            <label class="custom-control-label" for="1">100 à 5000 FCFA</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" name="price_range" wire:model="price_range" value="5005,25000" class="custom-control-input" id="2">
                                            <label class="custom-control-label" for="2">5005 à 25000 FCFA</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" name=price_range wire:model="price_range" value="25005,100000" class="custom-control-input" id="3">
                                            <label class="custom-control-label" for="3">25005 à 100000 FCFA</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" name="price_range" wire:model="price_range" value="100005,1000005" class="custom-control-input" id="4">
                                            <label class="custom-control-label" for="4">100005 à 1000005 FCFA</label>
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
                                            Boutique <span class="mdi mdi-chevron-down float-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                     data-parent="#accordion">
                                    <div class="card-body card-shop-filters">

                                        @foreach($boutiques as $bt)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="b{{ $bt->id }}">
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
                <div class="col-md-9">
                    <a href="#"><img class="img-fluid mb-3" src="img/shop.jpg" alt=""></a>
                    <div class="shop-head">
                        <a href="#"><span class="mdi mdi-home"></span> Recherche des produits</a>
                        <div class="btn-group float-right mt-2">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Ordonner&nbsp;&nbsp;&nbsp;
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Relevance</a>
                                <a class="dropdown-item" href="#">Price (Low to High)</a>
                                <a class="dropdown-item" href="#">Price (High to Low)</a>
                                <a class="dropdown-item" href="#">Discount (High to Low)</a>
                                <a class="dropdown-item" href="#">Name (A to Z)</a>
                            </div>
                        </div>
                        <h5 class="mb-3">Produits: {{ $categorie_selected }}</h5>
                    </div>
                    <div class="row">
                        @foreach($produits as $p)
                            <div class="col-md-4 mb-3">
                                <livewire:produit-card :produit="$p"/>
                            </div>
                        @endforeach

                    </div>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
<span class="page-link">
2
<span class="sr-only">(current)</span>
</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
