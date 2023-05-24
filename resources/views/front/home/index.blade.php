@extends('front.base')

@section('content')

    <livewire:topbar/>



    <section>
        <div class="p-4 text-center bg-ownred">
            <h3 class="text-white">Categories de produits</h3>
        </div>
        <div class="row">
            <div class="col-md-1"
                 style="background-image: url({{ asset('nimages/rect1.png') }}); background-repeat: no-repeat; background-size: cover">

            </div>
            <div class="col p-4" style="background-image: url({{ asset('nimages/rect2.png') }})">
                <div class="row">
                    @foreach($categories as $categorie)
                        <a href="{{ route('front.shop.search') }}?cats[0]={{ $categorie->id }}"
                           class="col-md-3 d-block">
                            <div class="p-3 bg-white text-center">
                                <img class="img-fluid" style="height: 150px"
                                     src="{{ asset('/storage/'.$categorie->image) }}" alt="">
                                <div>
                                    <h6 class="p-3">{{ $categorie->name }}</h6>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-1"
                 style="background-image: url({{ asset('nimages/rect.png') }}); ; background-repeat: no-repeat">

            </div>

        </div>
    </section>

    <section>
        <img src="{{ asset('nimages/IMAGE.png') }}" alt="">
    </section>

    <section class="py-3" style="background-image: url({{ asset('nimages/rect2.png') }}); background-color: # bg-white">
        <div class="text-center">
            <h3 class="font-weight-bold">Produits de saison</h3>
            <h5>
                Nos produits de saison sont disponibles, <br>
                Ils sont moins chers
            </h5>
            <div class="rounded mt-3 " style="height: 450px; width: 100%">
                <video width="1500" height="400" muted loop class="" class="" autoplay>
                    <source src="{{ asset('nimages/video.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </section>

    <section>
        <div class="container text-center">
            <div class="text-center p-2">
                <h3>ENSEIGNES</h3>
            </div>
            <section class="splide" aria-label="Splide ">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($boutiques as $boutique)
                            <div class="splide__slide" style="width: 222px;">
                                <div class="item">
                                    <div class="product">
                                        <img height="100px" width="100%" src="{{ asset('/storage/'. $boutique->image) }}"
                                             alt="{{ $boutique->nom }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </section>
            <div class="text-center p-3">
                <a href="{{ route('front.boutiques') }}" class="btn btn-dark px-5 py-3">VOIR TOUT</a>
            </div>
        </div>
    </section>

    <section>
        <img src="{{ asset('nimages/banner.png') }}" alt="">
    </section>

    <section class="text-center p-5" style="background-image: url({{ asset('nimages/rect2.png') }})">
        <h3>ESPACE COMMERÇANT</h3>
        <div class="row mt-4 align-items-center">
            <div class="col-12 col-md-6">
                <img src="{{ asset('nimages/espacecom.jpeg') }}" style="height: 350px" class="shadow">

            </div>
            <div class="col-6 text-left">
                <h6 class="text-left mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem explicabo facere fuga harum
                    id labore provident quas repudiandae sit suscipit.
                </h6>
                <button data-target="#login-modal" data-toggle="modal" class="btn btn-dark btn-lg px-5 py-3 "
                        style="border-radius: 0px !important;">SE CONNECTER
                </button>
                <button data-target="#register-modal" data-toggle="modal" class="btn btn-dark btn-lg px-5 py-3 "
                        style="border-radius: 0px !important;">S'INSCRIRE
                </button>
            </div>
        </div>
    </section>

    <section class="text-center p-3 bg-ownred"
             style="background-image: url({{ asset('nimages/rect2.png') }}); background-color: ">
        <div class=" p-5">
            <h4 class="text-white">NEWSLETTER</h4>
            <h4 style="color: black">Pour rester informé des promotions et de nos produits</h4>
            <div class="mt-4">
                <form action="">
                    <div class="d-flex justify-content-center">
                        <input type="email" class="p-3 rounded-0 w-25 border-0">
                        <button class="btn px-5 ml-2 rounded-0 rounded-0 tewt-white"
                                style="background-color: black; color: white !important;">ENVOYEZ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="modal fade login-modal-main" id="login-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-modal">
                        <div class="row">
                            <div class="col-lg-6 pad-right-0">
                                <div class="h-100 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('/nimages/logo.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 pad-left-0">
                                <button type="button" class="close close-top-right" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <div>
                                    <div class="login-modal-right">

                                        <div class="tab-content">
                                            <form method="post" action="{{ route('auth.login') }}"
                                                  class="tab-pane active" id="login" role="tabpanel">
                                                @csrf

                                                <h5 class="heading-design-h5">Se connecter</h5>
                                                <fieldset class="form-group">
                                                    <label>Email</label>
                                                    <input name="email" type="text" class="form-control"
                                                           placeholder="mon@email.com">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input name="password" type="password" class="form-control"
                                                           placeholder="********">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <button type="submit"
                                                            class="btn text-white btn-lg bg-ownred btn-block">Se
                                                        connecter
                                                    </button>
                                                </fieldset>


                                            </form>
                                        </div>


                                        <div class="clearfix">
                                            <a href="">Mot de passe oublié ?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade login-modal-main" id="register-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-modal">
                        <div class="row">
                            <div class="col-lg-6 pad-right-0">
                                <div class="h-100 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('/nimages/logo.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 pad-left-0">
                                <button type="button" class="close close-top-right" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <div>
                                    <div class="login-modal-right">

                                        <form action="{{ route('auth.register') }}" method="post" class="tab-pane"
                                              id="register" role="tabpanel">

                                            @csrf

                                            <h5 class="heading-design-h5">S'inscrire maintenant !</h5>


                                            <div class="pretty w-100 p-icon p-toggle p-plain">
                                                <input name="is_boutique" type="checkbox"/>
                                                <div style="color: black; border: 1px solid black"
                                                     class="state p-on  rounded w-100 p-3">
                                                    <span>Je suis une boutique</span>

                                                </div>
                                                <div style="color: black; border: 1px solid black; opacity: 0.3"
                                                     class="state p-off  rounded w-100 p-3">
                                                    <span>Je suis une boutique</span>
                                                </div>
                                            </div>
                                            <fieldset class="form-group">
                                                <label>Nom</label>
                                                <input name="name" type="text" class="form-control">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label>Email</label>
                                                <input name="email" type="text" class="form-control"
                                                       placeholder="mon@email.com">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label>Numero de téléphone</label>
                                                <input name="telephone" type="text" class="form-control"
                                                       placeholder="070000000">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label>Mot de passe</label>
                                                <input name="password" type="password" class="form-control"
                                                       placeholder="********">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label>Confirmer le mot de passe</label>
                                                <input name="confirm_password" type="password" class="form-control"
                                                       placeholder="********">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <button type="submit" class="btn text-white btn-lg bg-ownred btn-block">
                                                    Créer mon compte
                                                </button>
                                            </fieldset>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        new Splide( '.splide',{
            perPage: 6,
            rewind : true,
        } ).mount();
    </script>
@endsection
