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
                                        <div class="mb-3">
                                            <label for="">Prix Minimum</label>
                                            <select name="prixmin" wire:model="prixmin" id="prixmin">
                                                <option value="0">0</option>
                                                <option value="500">500</option>
                                                <option value="5000">5000</option>
                                                <option value="10000">10000</option>
                                                <option value="25000">25000</option>
                                                <option value="50000">50000</option>
                                                <option value="100000">100000</option>
                                                <option value="1000000">1000000</option>
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
                                            Boutique <span class="mdi mdi-chevron-down float-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
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
                        <div>
                            {{ print_r($cats) }} <br>
                            {{ print_r(explode(',', $price_range)) }} <br>
                            {{ print_r($boutiques_filters) }} <br>

                        </div>
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
