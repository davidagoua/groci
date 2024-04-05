@extends('front.base')

@section('content')

    <livewire:another-top-bar/>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('nimages/banner2.png') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('nimages/banner2.png') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('nimages/banner2.png') }}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <livewire:search-component />

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
