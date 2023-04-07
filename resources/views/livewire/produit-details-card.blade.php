<div>
    <section class="shop-single section-padding pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2>{{ $produit->nom }}</h2>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <img src="{{ asset('/storage/'. $produit->image()->path )}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    @foreach($produit->propositions as $prop)

                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <div>
                                            <img height="75" width="75" src="{{ asset('/storage/'. $prop->boutique->image) }}" alt="{{ $prop->boutique->nom }}">
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <div class="text-success font-weight-bold">
                                            <span>Prix: </span><span>{{ $prop->prix }} FCFA</span>
                                        </div>
                                        <div class="">
                                            <b>Contact:</b><span>{{ $prop->boutique->contact }}</span>
                                        </div>
                                        <div class="">
                                            <b>Nom:</b><span>{{ $prop->boutique->nom }}</span>
                                        </div>
                                        <div class="">
                                            <b>Email:</b><span>{{ $prop->boutique->email }}</span>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        Disponibilité:
                                        @if($produit->is_actif)
                                            <span class="bg-warning badge">En stock</span>
                                        @else
                                            <span class="bg-gray-700 badge">Fini</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-4">
                                        <div class="d-flex justify-content-around ">
                                            <a href="{{ route('front.shop.add_cart', ['proposition'=> $prop]) }}" class="btn btn-sm btn-warning">
                                                <span class="mdi mdi-cart-plus"></span>
                                                <span>Acheter</span>
                                            </a>
                                            <a href="" class="btn btn-sm btn-primary">
                                                <span class="mdi mdi-information"></span>
                                                <span>Info</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a href="" class="btn-primary  btn btn-sm">
                                            <span class="mdi mdi-map-marker"></span>
                                            <span>Localiser</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
