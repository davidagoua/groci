<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/groci/theme-three/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2023 11:58:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>CMoinsCher - Comparateur de prix</title>


    <link href="/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="/front/vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css"/>

    <link href="/front/vendor/select2/css/select2-bootstrap.css"/>
    <link href="/front/vendor/select2/css/select2.min.css" rel="stylesheet"/>

    <link href="/front/css/osahan.css" rel="stylesheet">

    <link rel="stylesheet" href="/front/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/front/vendor/owl-carousel/owl.theme.css">
    @livewireStyles

    <style>
        .top-categories-search {
            left: 0;
            margin: auto;
            box-shadow: 0 2px 8px 0 rgba(52, 53, 52, 0.46);
            position: absolute;
            right: 0;
            top: 16px;
            width: 679px;
        }
        body{
            background-color: white !important;
        }
        .bg-verde{
            background-color: #3B746C;
        }
    </style>

    @stack('css')
</head>
<body>
    <livewire:topbar/>

    <livewire:topsearch/>

<livewire:top-menu/>

@yield('content')

@if(false)
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
@endif

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
@else
    @include('front.parts.footer')
@endif

@if(true)
    <section class="bg-verde text-white" >
        <div class="container p-1">
            <div class="text-center text-white ">
                <div class="">
                    <p class="mb-0 text-white">&copy; Copyright 2023 <strong class="text-white">Conseil National de lutte Contre la Vie Chère</strong>. Tous
                        droit réservé<br>
                    </p>
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
        'Felicitation',
        "{{ session()->get('info') }}",
        'danger'
    )
    @endif

    @if(session('success'))
    Swal.fire(
        'Felicitation',
        "{{ session()->get('success') }}",
        'success'
    )
    @endif

    let updateVille = (e)=>{
        e.preventDefault()
        let selectedVille = document.querySelector('#ville').value
        console.log(selectedVille)
    }

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
@stack('js')
</body>

<!-- Mirrored from askbootstrap.com/preview/groci/theme-three/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2023 11:58:20 GMT -->
</html>
