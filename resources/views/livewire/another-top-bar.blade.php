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


    <div class=" px-2 bg-ownred d-flex justify-content-between align-items-center   ">
        <div class="flex-grow-1 text-center">
            <h5 id="change-animation-type-example" class="text-white animation zoom-in" style="animation-iteration-count: infinite; animation-duration: 1000ms;">
                Profitez des reductions de plus de 70% sur le top 6 des produits les plus vendus
            </h5>
        </div>
        <div>
            <div class="p-2" style="background-color: forestgreen">
                <h4 class="text-white mt-0">
                    <span class="mdi mdi-phone"></span>
                    1343</h4>
            </div>
        </div>
    </div>
    <div class="shadow" >
        <div class="container d-flex justify-content-between p-2  align-items-center">
            <a href="/">
                <img src="{{ asset('nimages/logo.png') }}" alt="">
            </a>
            <div class="flex-grow-1 ml-5">
                <div class="">
                    <div class="d-flex  justify-content-between align-items-center">
                        <a class="px-4 py-3" href="{{ route('front.home') }}" >
                            <h6 class="@if(request()->routeIs('front.home')) text-danger @else text-black @endif ">Acceuil</h6>
                        </a>
                        <a class="px-4 py-3" href="{{ route('front.shop.search') }}"  class=" text-dander">
                            <h6 class="@if(request()->routeIs('front.shop.search')) text-danger @else text-black @endif ">Selection par budget</h6>
                        </a>
                        <a class="px-4 py-3" href="{{ route('front.contact') }}" class=" text-black">
                            <h6 class="@if(request()->routeIs('front.contact')) text-danger @else text-black @endif ">Aide</h6>
                        </a>

                        <div class="flex-grow-1 text-right">
                            @if(request()->routeIs('front.shop.search'))
                            <livewire:cart-widget/>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

