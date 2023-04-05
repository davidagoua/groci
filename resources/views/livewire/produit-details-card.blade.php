<div>
    <section class="shop-single section-padding pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="shop-detail-left">
                        <div class="shop-detail-slider">
                            <div class="favourite-icon">
                                <a class="fav-btn" title="" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="59% OFF"><i class="mdi mdi-tag-outline"></i></a>
                            </div>
                            <div id="sync1" class="owl-carousel">
                                @foreach($produit->image_produits as $media)
                                <div class="item"><img alt="" src="{{ asset('/storage/'. $media->path) }}" class="img-fluid img-center"></div>
                                @endforeach
                            </div>
                            <div id="sync2" class="owl-carousel">
                                @foreach($produit->image_produits as $media)
                                <div class="item"><img alt="" src="{{ asset('/storage/'. $media->path) }}" class="img-fluid img-center"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop-detail-right">
                        @if(false)
                            <span class="badge badge-success">50% OFF</span>
                        @endif
                        <h2>{{ $produit->nom }}</h2>
                        <h6><strong><span class="mdi mdi-approval"></span> {{ $produit->categorie->name }}</strong> </h6>

                        <p class="offer-price mb-0">
                            <span class="text-success">
                                {{ $produit->propositions()->min('prix') }} - {{ $produit->propositions()->max('prix') }} FCFA
                            </span>
                        </p>
                        <p>
                            <p>{{ $produit->description }}</p>
                        </p>

                        <div class="short-description" style="max-height: 500px; overflow-y: scroll">
                            <h5>
                                @foreach($produit->propositions as $proposition)
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <p class="float-right"><h6>{{ $proposition->boutique->nom }}</h6></p>
                                    </div>
                                    <div class="col-4">
                                        {{ $proposition->prix }} FCFA

                                        @if($proposition->is_actif)
                                        <span class="badge badge-success">En Stock</span>
                                            @else
                                        <span class="badge badge-danger">Rupture</span>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <a href="{{ route('front.shop.add_cart', ['proposition'=>$proposition]) }}" class="btn btn-secondary p-2 btn-sm"><i class="mdi mdi-cart-outline"></i> Ajouter</a>
                                    </div>

                                </div>
                                    @endforeach



                            </h5>


                        </div>
                        <h6 class="mb-3 mt-4">Why shop from Groci?</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <i class="mdi mdi-truck-fast"></i>
                                    <h6 class="text-info">Livraison Gratuite</h6>
                                    <p>Livraison gratuite partout à Abidjan</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-box">
                                    <i class="mdi mdi-basket"></i>
                                    <h6 class="text-info">100% Garanti</h6>
                                    <p>Produit de qualité</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="section-header">
                <h5 class="heading-design-h5">Vous pourriez aimer aussi ces produits
                    <a class="float-right text-secondary" href="{{ route('front.shop.search') }}">Voir Tout</a>
                </h5>
            </div>
            <div class=" owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="row" >


                        @foreach($related_produits as $produit)
                            <div class="col-md-2 ">
                                <livewire:produit-card :produit="$produit"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
