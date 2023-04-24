<div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
          crossorigin=""/>

    <style>
        .map { height: 250px; }
        body{
            background-color: #FBE6D2 ;
        }
    </style>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin=""></script>

    <section class="shop-single section-padding pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <span class="badge badge-primary">{{ $produit->categorie->name }}</span>
                            <h2>{{ $produit->nom }}</h2>
                            <h4>{{ $produit->unite }}</h4>
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
                                        @if($prop->is_actif)
                                            <span class="bg-warning badge">En stock</span>
                                        @else
                                            <span class="bg-danger text-white badge">Epuisé</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4 col-6">
                                        <div class="d-flex justify-content-around ">
                                            <a href="{{ route('front.shop.add_cart', ['proposition'=> $prop]) }}" class="btn btn-sm btn-warning">
                                                <span class="mdi mdi-cart-plus"></span>
                                                <span>Acheter</span>
                                            </a>
                                            <a href="#modal-info-{{ $prop->id }}" data-toggle="modal" class="btn btn-sm btn-primary">
                                                <span class="mdi mdi-information"></span>
                                                <span>Info</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a
                                            onclick="refreshMap_{{ $prop->id }}()"
                                            href="#modal-localiser-{{ $prop->id }}" data-toggle="modal" class="btn-primary  btn btn-sm">
                                            <span class="mdi mdi-map-marker"></span>
                                            <span>Localiser</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal" id="modal-info-{{ $prop->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header font-weight-bold">{{ $prop->boutique->nom }}</div>
                                    <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-5 text-center">
                                            <div>
                                                <img height="75" width="75" src="{{ asset('/storage/'. $prop->boutique->image) }}" alt="{{ $prop->boutique->nom }}">
                                            </div>
                                        </div>
                                        <div class="col-md-7">

                                            <div class="">
                                                <b>Ville:</b><span>{{ $prop->boutique->ville }}</span>
                                            </div>
                                            @isset($prop->boutique->commune)
                                                <div class="">
                                                    <b>Commune:</b><span>{{ $prop->boutique->commune }}</span>
                                                </div>
                                            @endisset
                                            <div class="">
                                                <b>Contact:</b><span>{{ $prop->boutique->contact }}</span>
                                            </div>
                                            <div class="">
                                                <b>Contact 2:</b><span>{{ $prop->boutique->contact2 }}</span>
                                            </div>

                                            <div class="">
                                                <b>Email:</b><span>{{ $prop->boutique->email }}</span>
                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="modal-localiser-{{ $prop->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="map" id="map-{{ $prop->boutique->id }}"></div>
                                        <div>
                                            <a target="_blank" href="http://maps.google.com?q={{ $prop->boutique->lat }}, {{ $prop->boutique->lng }}" class="btn btn-primary btn-block">
                                                <span class="mdi mdi-map"></span>
                                                <span>Google Map</span>
                                            </a>
                                        </div>
                                        <script>
                                            var map_{{ $prop->boutique->id }} = L.map('map-{{ $prop->boutique->id }}').setView([{{ $prop->boutique->lat }}, {{ $prop->boutique->lng }}], 13);
                                            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                maxZoom: 19,
                                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                            }).addTo(map_{{ $prop->boutique->id }});

                                            let refreshMap_{{ $prop->id}} = ()=>{

                                                setTimeout(()=>{
                                                    map_{{ $prop->boutique->id }}.invalidateSize();
                                                }, 200)
                                            }
                                            var marker = L.marker([{{ $prop->boutique->lat }}, {{ $prop->boutique->lng }}]).addTo(map_{{ $prop->boutique->id }});

                                        </script>
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
