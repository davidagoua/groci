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
            font-family: Bahnschrift;
        }
        .nav-item:hover{
            opacity: 0.5;
        }
        .bg-verde{
            background-color: #3B746C;
        }
        .bg-ownred{
            background-color: red;
        }
        .text-ownred{
            color: red;
        }
    </style>

    @stack('css')
</head>
<body>


@yield('content')


@include('front.parts.footer')

@if(true)
    <section style="background-color: black" class=" text-white" >
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
