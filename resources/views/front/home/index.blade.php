@extends('front.base')

@section('content')

    <livewire:top-carousel/>

    <livewire:categorie-carousel/>

    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="section-header">
                <h5 class="heading-design-h5">Top 6 des produits les plus vendus
                    <a class="float-right text-secondary" href="{{ route('front.shop.search') }}">Voir Tout</a>
                </h5>
            </div>
            <div class=" owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="row" >

                        @foreach($produits as $produit)
                            <div class="col-md-2 ">
                                <livewire:produit-card :produit="$produit"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex mt-2 justify-content-center">
                <img src="{{ asset('/images/1.jpg') }}" alt="">
                <img src="{{ asset('/images/2.jpg') }}" alt="">
            </div>
        </div>
    </section>

    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="section-header">
                <h5 class="heading-design-h5">Top 6 des produits les plus recents
                    <a class="float-right text-secondary" href="{{ route('front.shop.search') }}">Voir Tout</a>
                </h5>
            </div>
            <div class=" owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="row" >


                        @foreach($produits as $produit)
                            <div class="col-md-2 ">
                                <livewire:produit-card :produit="$produit"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex mt-2 justify-content-center">
                <img src="{{ asset('/images/1.jpg') }}" alt="">
                <img src="{{ asset('/images/2.jpg') }}" alt="">
            </div>
        </div>
    </section>

    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="section-header">
                <h5 class="heading-design-h5">Top 6 des produits les mieux notés
                    <a class="float-right text-secondary" href="{{ route('front.shop.search') }}">Voir Tout</a>
                </h5>
            </div>
            <div class=" owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="row" >


                        @foreach($produits as $produit)
                            <div class="col-md-2 mb-2 ">
                                <livewire:produit-card :produit="$produit"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex mt-2 justify-content-center">
                <img src="{{ asset('/images/1.jpg') }}" alt="">
                <img src="{{ asset('/images/2.jpg') }}" alt="">
            </div>
        </div>
    </section>
@endsection
