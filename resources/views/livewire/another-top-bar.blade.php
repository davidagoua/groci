<div>

    @guest()
        <div class="modal fade login-modal-main" id="bd-example-modal">
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
                                                <form method="post"  action="{{ route('auth.login') }}" class="tab-pane active" id="login" role="tabpanel">
                                                    @csrf

                                                    <h5 class="heading-design-h5">Se connecter</h5>
                                                    <fieldset class="form-group">
                                                        <label>Email</label>
                                                        <input name="email" type="text" class="form-control" placeholder="mon@email.com">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Mot de passe</label>
                                                        <input name="password"  type="password" class="form-control" placeholder="********">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <button type="submit" class="btn text-white btn-lg bg-ownred btn-block">Se
                                                            connecter
                                                        </button>
                                                    </fieldset>


                                                </form>
                                                <form action="{{ route('auth.register') }}" method="post" class="tab-pane" id="register" role="tabpanel">

                                                    @csrf

                                                    <h5 class="heading-design-h5">S'inscrire maintenant !</h5>

                                                    <fieldset class="form-group">
                                                        <input name="is_boutique" type="radio" class="" >
                                                        <label>Je suis une boutique</label>
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Nom</label>
                                                        <input name="name" type="text" class="form-control" >
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Email</label>
                                                        <input name="email" type="text" class="form-control" placeholder="mon@email.com">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Numero de téléphone</label>
                                                        <input name="telephone" type="text" class="form-control" placeholder="070000000">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Mot de passe</label>
                                                        <input name="password" type="password" class="form-control" placeholder="********">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Confirmer le mot de passe</label>
                                                        <input name="confirm_password" type="password" class="form-control" placeholder="********">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <button type="submit" class="btn text-white btn-lg bg-ownred btn-block">
                                                            Créer mon compte
                                                        </button>
                                                    </fieldset>

                                                </form>
                                            </div>


                                            <div class="clearfix"></div>
                                            <div class="text-center login-footer-tab">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#login"
                                                           role="tab"><i class="mdi mdi-lock"></i> CONNEXION</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#register" role="tab"><i
                                                                class="mdi mdi-pencil"></i> INSCRIPTION</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest


    <div class=" px-5 bg-ownred p-3 d-flex justify-content-center">
        <div>

        </div>

    </div>
    <div class="shadow" >
        <div class="container d-flex justify-content-between p-2  align-items-center">
            <div>
                <img src="{{ asset('nimages/logo.png') }}" alt="">
            </div>
            <div class="flex-grow-1 ml-5">
                <div class="">
                    @if(false)
                        <a href="#" class=" text-white"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i>{{ $localite }} </a>

                    @endif
                    @guest()
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('front.home') }}"  class=" text-black">
                                <h5>Acceuil</h5>
                            </a>
                            <a href="{{ route('front.shop.search') }}"  class=" text-black">
                                <h5>Selection par budget</h5>
                            </a>
                            <a href="{{ route('front.contact') }}" class=" text-black">
                                <h5>Contact</h5>
                            </a>
                            <a href="#register" data-target="#bd-example-modal" data-toggle="modal" class=" text-black">
                                <h5>Inscription</h5>
                            </a>
                            <a href="#" data-target="#bd-example-modal" style="color: white !important" data-toggle="modal" class="btn rounded-0  bg-ownred text-white ml-3 mr-3">
                                <h5 style="color: white !important;">Connexion</h5>
                            </a>
                            <div>|</div>
                            <div>
                                <livewire:cart-widget/>
                            </div>
                        </div>
                    @endguest

                    @auth()
                        <a href="{{ route('auth.logout') }}" class="ml-3 text-white mr-3"><h5>Se déconnecter</h5></a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="p-5" style="background-image: url({{ asset('nimages/car1.png') }})">
        <p class="m-4">&nbsp;</p>
        <p class="m-4">&nbsp;</p>
    </div>
</div>

