<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/groci/theme-three/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2023 11:58:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>Groci - Comparateur de prix</title>


    <link href="/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="/front/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css"/>

    <link href="/front/vendor/select2/css/select2-bootstrap.css"/>
    <link href="/front/vendor/select2/css/select2.min.css" rel="stylesheet"/>

    <link href="/front/css/osahan.css" rel="stylesheet">

    <link rel="stylesheet" href="/front/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/front/vendor/owl-carousel/owl.theme.css">
    @livewireStyles
</head>
<body>

@guest()
    <div class="modal fade login-modal-main" id="bd-example-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-modal">
                        <div class="row">
                            <div class="col-lg-6 pad-right-0">
                                <div class="login-modal-left">
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
                                            <div class="tab-pane active" id="login" role="tabpanel">
                                                <h5 class="heading-design-h5">Se connecter</h5>
                                                <fieldset class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="mon@email.com">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input type="password" class="form-control" placeholder="********">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-secondary btn-block">Se
                                                        connecter
                                                    </button>
                                                </fieldset>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="register" role="tabpanel">
                                                <h5 class="heading-design-h5">S'inscrire maintenat !</h5>
                                                <fieldset class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" placeholder="mon@email.com">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input type="password" class="form-control" placeholder="********">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label>Confirmer le mot de passe</label>
                                                    <input type="password" class="form-control" placeholder="********">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-secondary btn-block">
                                                        Créer mon compte
                                                    </button>
                                                </fieldset>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">I Agree with
                                                        <a href="#">Term and Conditions</a></label>
                                                </div>
                                            </div>
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


<div class="navbar-top bg-white" style="background-color: white !important;">
    <div class="container bg-white">
        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="#" class="mb-0 text-black">
                    <img class="img-responsive" src="https://luttecontreviechere.ci/front/images/armoirie.png"
                         alt="logo">
                    <img class="img-responsive" src="https://luttecontreviechere.ci/front/images/cnlvc.png" alt="logo">
                </a>
            </div>
            <div class="col-md-6 text-right">
                <a href="#" class="text-dark"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i>Abidjan </a>
                @guest()
                    <a href="#" data-target="#bd-example-modal" data-toggle="modal" class="text-dark ml-3 mr-3"><i
                            class="mdi mdi-lock"></i>Se connecter</a>
                    <a href="#" data-target="#bd-example-modal" data-toggle="modal" class="text-dark"><i
                            class="mdi mdi-account-circle"></i> S'inscrire</a>
                @endguest

                @auth()
                    <a href="#" class="text-dark ml-3 mr-3"><i class="mdi mdi-lock"></i>Se déconnecter</a>
                @endauth
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-light navbar-expand-lg bg-dark bg-faded osahan-menu">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <a class="navbar-brand" href="{{ route('front.home') }}"> <img class="img-responsive" width="50"
                                                                           src="{{ asset('/images/logo.png') }}"
                                                                           alt="logo"> </a>
        </div>
        <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse"
                data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarNavDropdown ">
            <div class="navbar-nav mr-auto mt-5 mt-lg-2 margin-auto top-categories-search-main">
                <div class="top-categories-search">
                    <div class="input-group">
                        <span class="input-group-btn categories-dropdown">
                            <select class="form-control-select">
                            <option selected="selected">Your City</option>
                            <option value="0">New Delhi</option>
                            <option value="2">Bengaluru</option>
                            <option value="3">Hyderabad</option>
                            <option value="4">Kolkata</option>
                            </select>
                        </span>
                        <input class="form-control" placeholder="Search products in Your City"
                               aria-label="Search products in Your City" type="text">
                        <span class="input-group-btn">
<button class="btn btn-secondary" type="button"><i class="mdi mdi-file-find"></i> Search</button>
</span>
                    </div>
                </div>
            </div>
            <div class="my-2 my-lg-0">
                <ul class="list-inline main-nav-right">
                    <livewire:cart-widget/>
                </ul>
            </div>
        </div>
    </div>
</nav>

<livewire:top-menu/>

@yield('content')

<section class="section-padding bg-white border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="feature-box">
                    <i class="mdi mdi-truck-fast"></i>
                    <h6>Free & Next Day Delivery</h6>
                    <p>Lorem ipsum dolor sit amet, cons...</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="feature-box">
                    <i class="mdi mdi-basket"></i>
                    <h6>100% Satisfaction Guarantee</h6>
                    <p>Rorem Ipsum Dolor sit amet, cons...</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="feature-box">
                    <i class="mdi mdi-tag-heart"></i>
                    <h6>Great Daily Deals Discount</h6>
                    <p>Sorem Ipsum Dolor sit amet, Cons...</p>
                </div>
            </div>
        </div>
    </div>
</section>

@if(false)
    <section class="section-padding footer bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <h4 class="mb-5 mt-0"><a class="logo" href="index.html"><img
                                src="../../../public/front/img/logo-footer.png" alt="Groci"></a></h4>
                    <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-phone"></i> +61 525 240 310</a></p>
                    <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-cellphone-iphone"></i> 12345 67890,
                            56847-98562</a></p>
                    <p class="mb-0"><a class="text-success" href="#"><i class="mdi mdi-email"></i> <span
                                class="__cf_email__" data-cfemail="b3dad2dedcc0d2dbd2ddf3d4ded2dadf9dd0dcde">[email&#160;protected]</span></a>
                    </p>
                    <p class="mb-0"><a class="text-primary" href="#"><i class="mdi mdi-web"></i>
                            www.askbootstrap.com</a></p>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h6 class="mb-4">TOP CITIES </h6>
                    <ul>
                        <li><a href="#">New Delhi</a></li>
                        <li><a href="#">Bengaluru</a></li>
                        <li><a href="#">Hyderabad</a></li>
                        <li><a href="#">Kolkata</a></li>
                        <li><a href="#">Gurugram</a></li>
                        <ul>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h6 class="mb-4">CATEGORIES</h6>
                    <ul>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Grocery & Staples</a></li>
                        <li><a href="#">Breakfast & Dairy</a></li>
                        <li><a href="#">Soft Drinks</a></li>
                        <li><a href="#">Biscuits & Cookies</a></li>
                        <ul>
                </div>
                <div class="col-lg-2 col-md-2">
                    <h6 class="mb-4">ABOUT US</h6>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Store Location</a></li>
                        <li><a href="#">Affillate Program</a></li>
                        <li><a href="#">Copyright</a></li>
                        <ul>
                </div>
                <div class="col-lg-3 col-md-3">
                    <h6 class="mb-4">Download App</h6>
                    <div class="app">
                        <a href="#"><img src="../../../public/front/img/google.png" alt=""></a>
                        <a href="#"><img src="../../../public/front/img/apple.png" alt=""></a>
                    </div>
                    <h6 class="mb-3 mt-4">GET IN TOUCH</h6>
                    <div class="footer-social">
                        <a class="btn-facebook" href="#"><i class="mdi mdi-facebook"></i></a>
                        <a class="btn-twitter" href="#"><i class="mdi mdi-twitter"></i></a>
                        <a class="btn-instagram" href="#"><i class="mdi mdi-instagram"></i></a>
                        <a class="btn-whatsapp" href="#"><i class="mdi mdi-whatsapp"></i></a>
                        <a class="btn-messenger" href="#"><i class="mdi mdi-facebook-messenger"></i></a>
                        <a class="btn-google" href="#"><i class="mdi mdi-google"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if(false)
    <section class="pt-4 pb-4 footer-bottom">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-6 col-sm-6">
                    <p class="mt-1 mb-0">&copy; Copyright 2023 <strong class="text-dark">C Moins Chère</strong>. Tous
                        droit réservé<br>
                        <small class="mt-0 mb-0">Made with <i class="mdi mdi-heart text-danger"></i> by <a
                                href="https://askbootstrap.com/" target="_blank" class="text-primary">Ask Bootstrap</a>
                        </small>
                    </p>
                </div>
                <div class="col-lg-6 col-sm-6 text-right">
                    <img alt="osahan logo" src="../../../public/front/img/payment_methods.png">
                </div>
            </div>
        </div>
    </section>
@endif


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    @if(session('info'))
    Swal.fire(
        'Panier',
        "{{ session()->get('info') }}",
        'info'
    )
    @endif

    @if(session('danger'))
    Swal.fire(
        'Panier',
        "{{ session()->get('info') }}",
        'danger'
    )
    @endif

    @if(session('success'))
    Swal.fire(
        'Panier',
        "{{ session()->get('info') }}",
        'success'
    )
    @endif

</script>
<script src="/front/vendor/jquery/jquery.min.js" type="text/javascript"></script>
<script src="/front/vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script>
    const myModal = new bootstrap.Modal('#bd-example-modal');
    myModal.show()
</script>
<script src="/front/vendor/select2/js/select2.min.js" type="text/javascript"></script>

<script src="/front/vendor/owl-carousel/owl.carousel.js" type="text/javascript"></script>

<script src="/front/js/custom.js" type="text/javascript"></script>

<script src="/front/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="fb3ffff9a2f2592259cfd08d-|49" defer=""></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"7a8486894add2a2c","version":"2023.2.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}'
        crossorigin="anonymous"></script>


@livewireScripts
</body>

<!-- Mirrored from askbootstrap.com/preview/groci/theme-three/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2023 11:58:20 GMT -->
</html>
