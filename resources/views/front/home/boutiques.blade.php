@extends('front.base')

@push('css')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
          crossorigin=""/>

    <style>
        .map { height: 250px; }
        body{
            background-color: #FBE6D2 ;
        }
    </style>
@endpush

@section('content')

    <livewire:another-top-bar/>

    <div class="p-5" style="background-image: url({{ asset('nimages/car1.png') }}); background-size: cover; background-repeat: no-repeat">
        <p class="m-4 text-center">&nbsp;
        <h1 style="font-size: 5em; color: white !important;" class="text-white text-center">ENSEIGNES DISPONIBLE</h1>
        </p>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                @foreach($boutiques as $boutique)
                    <div class="col-6 col-md-3 mb-3">
                        <div class="p-3 shadow-sm">
                            <img height="100px" width="100%" src="{{ asset('/storage/'. $boutique->image) }}" alt="{{ $boutique->nom }}">
                            <div class="text-center" >
                                {{ $boutique->nom }}
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="modal-localiser-{{ $boutique->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="map" id="map-{{ $boutique->id }}"></div>
                                    <div>
                                        <a target="_blank" href="http://maps.google.com?q={{ $boutique->lat }}, {{ $boutique->lng }}" class="btn btn-primary btn-block">
                                            <span class="mdi mdi-map"></span>
                                            <span>Google Map</span>
                                        </a>
                                    </div>
                                    <script>
                                        var map_{{ $boutique->id }} = L.map('map-{{ $boutique->id }}').setView([{{ $boutique->lat }}, {{ $boutique->lng }}], 13);
                                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            maxZoom: 19,
                                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                        }).addTo(map_{{ $boutique->id }});

                                        let refreshMap_{{ $boutique->id}} = ()=>{

                                            setTimeout(()=>{
                                                map_{{ $boutique->id }}.invalidateSize();
                                            }, 200)
                                        }
                                        var marker = L.marker([{{ $boutique->lat }}, {{ $boutique->lng }}]).addTo(map_{{ $boutique->id }});

                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
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

@endsection
