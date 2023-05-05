@extends('front.base')

@section('content')

    <section>
        <div class="row">
            <div class="col-md-1" style="background-image: url({{ asset('nimages/rect1.png') }})">
                <img src="" alt="">
            </div>
            <div class="col p-4" style="background-image: url({{ asset('nimages/rect2.png') }})">
                <div class="row">
                    @foreach($categories as $categorie)
                    <div class="col-md-3">
                        <div class="p-3 bg-white text-center">
                            <img class="img-fluid" src="{{ asset('/storage/'.$categorie->image) }}" alt="">
                            <div>
                                <h6 class="p-3">{{ $categorie->name }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-1" style="background-image: url({{ asset('nimages/rect.png') }})">
                <img src="" alt="">
            </div>

        </div>
    </section>

    <section>
        <img src="{{ asset('nimages/IMAGE.png') }}" alt="">
    </section>

    <section class="py-3" style="background-image: url({{ asset('nimages/rect2.png') }}); background-color: #eee">
        <div class="container">
            <div class="font-weight-bold">
                <h3 class="font-weight-bold">Produits de saison</h3>
                <h5>
                    Nos produits de saison sont disponibles, <br>
                    Ils sont moins chers
                </h5>
                <div class="rounded embed-responsive">
                    <video style="height: 300px; width: 80%" autoplay>
                        <source  src="{{ asset('nimages/video.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="row">
                    @foreach($produits as $produit)
                        <div class="col-4 mt-3">
                            <livewire:produit-card :produit="$produit" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <img src="{{ asset('nimages/auchan.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('nimages/ocofrais.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('nimages/sococe.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('nimages/bonprix.png') }}" alt="">
                </div>
                <div class="col">
                    <img src="{{ asset('nimages/carrefour.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section>
        <img src="{{ asset('nimages/banner.png') }}" alt="">
    </section>

    <section class="text-center bg-ownred" style="background-image: url({{ asset('nimages/rect2.png') }}); background-color: ">
        <div class=" p-5">
            <h4 class="text-white">NEWSLETTER</h4>
            <h4>Pour rester informé des promotions et de nos produits</h4>
            <div>
                <form action="">
                    <div class="d-flex justify-content-center">
                        <input type="email" class="p-3 rounded-0 w-25 border-0" >
                        <button class="btn px-5 ml-2 rounded-0 rounded-0 tewt-white" style="background-color: black; color: white !important;">ENVOYEZ</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="text-center p-2">
        <img src="{{ asset('nimages/group.png') }}" alt="">
    </section>

@endsection
