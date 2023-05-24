<div style="background-color: #F4F4F4">

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

    <section class="shop-single section-padding pt-5" style="background-image: url({{ asset('nimages/rect2.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <span class="badge badge-primary">{{ $produit->categorie->name }}</span>
                    <h2>{{ $produit->nom }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('/storage/'. $produit->image()->path )}}" alt="">
                        </div>
                    </div>
                    <div class="mt-4">
                        <h6>
                            {{ $produit->description }}
                        </h6>
                    </div>
                </div>
                <div class="col-md-6">

                    @foreach($produit->propositions as $prop)

                        <div class="card mb-2">
                            <div class="card-body p-3">
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">
                                        <div>
                                            <img height="75" width="75" src="{{ asset('/storage/'. $prop->boutique->image) }}" alt="{{ $prop->boutique->nom }}">
                                        </div>

                                    </div>
                                    <div class="col-md-5 col-8">
                                        <h6 class="mb-0">
                                            <span class="font-weight-light">Prix/</span><span class="text-danger font-weight-bold">{{ $prop->prix }} FCFA/{{ $prop->produit->unite }}</span>
                                        </h6>
                                    </div>
                                    <div class="col-md-2 col-4">
                                        @if($prop->is_actif)
                                            <span class="text-success">En stock</span>
                                        @else
                                            <span class="text-danger">Indisponible</span>
                                        @endif
                                    </div>
                                    <div class="col-md-3 col-12 px-0">
                                        <a href="{{ route('front.shop.add_cart', ['proposition'=> $prop]) }}" class="btn p-2" style="background-color: #F4F4F4">
                                            <span style="font-size: 1.8em" class="mdi text-warning mdi-basket"></span>
                                        </a>
                                        <a href="#modal-info-{{ $prop->id }}" data-toggle="modal" class="btn p-2" style="background-color: #F4F4F4">
                                            <span style="font-size: 1.8em" class="mdi text-success mdi-phone"></span>
                                        </a>
                                        <a onclick="refreshMap_{{ $prop->id }}()"
                                           href="#modal-localiser-{{ $prop->id }}" data-toggle="modal" class="btn p-2" style="background-color: #F4F4F4">
                                            <span style="font-size: 1.8em" class="mdi text-danger mdi-map-marker"></span>
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
            <div class="section-header d-flex justify-content-between align-items-center">
                <h5 class="heading-design-h5">Autres produits

                </h5>
                <a class="float-right text-danger" href="{{ route('front.shop.search') }}?cats[0]={{ $produit->categorie_id }}">Voir Tout</a>
            </div>
            <div class=" owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="row" >


                        @foreach($related_produits as $produit)
                            <div class="col-md-3 ">
                                <x-product-card :produit="$produit"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <img src="{{ asset('nimages/banner.png') }}" alt="">
    </section>

    <section class="text-center p-3 bg-ownred" style="background-image: url({{ asset('nimages/rect2.png') }}); background-color: ">
        <div class=" p-5">
            <h4 class="text-white">NEWSLETTER</h4>
            <h4 style="color: black">Pour rester informé des promotions et de nos produits</h4>
            <div class="mt-4">
                <form action="">
                    <div class="d-flex justify-content-center">
                        <input type="email" class="p-3 rounded-0 w-25 border-0" >
                        <button class="btn px-5 ml-2 rounded-0 rounded-0 tewt-white" style="background-color: black; color: white !important;">ENVOYEZ</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
