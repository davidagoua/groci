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
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet"/>
    <style>
        .top-link:hover {
            background-color: red;
            padding: 10px 12px;
            color: white;
        }
        .top-link h5{
            margin-bottom: 0px;
        }
        .top-link:hover h5{
            color: white;
        }
    </style>
    <link href="/front/css/osahan.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js" integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="/front/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/front/vendor/owl-carousel/owl.theme.css">
    @livewireStyles
    <script src="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
    "></script>
        <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet">

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

<section class="text-center p-2">
    <img src="{{ asset('nimages/group.png') }}" alt="">
    <img src="{{ asset('images/common.png') }}">
</section>

@if(true)
    <section style="background-color: black" class=" text-white" >
        <div class="container p-1">
            <div class="text-center text-white ">
                <div class="">
                    <p class="mb-0 text-white">&copy; Copyright 2023 <strong class="text-white">Conseil National de lutte Contre la Vie Chère</strong>. Tous
                        droit réservés<br>
                    </p>
                </div>

            </div>
        </div>
    </section>
@endif



<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js" integrity="sha512-2sI5N95oT62ughlApCe/8zL9bQAXKsPPtZZI2KE3dznuZ8HpE2gTMHYzyVN7OoSPJCM1k9ZkhcCo3FvOirIr2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        'Félicitation',
        "{{ session()->get('info') }}",
        'danger'
    )
    @endif

    @if(session('success'))
    Swal.fire(
        'Félicitation',
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
<script src="/front/vendor/owl-carousel/owl.carousel.js" type="text/javascript"></script>
<script src="/front/vendor/jquery/jquery.min.js" type="text/javascript"></script>
<script src="/front/vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="/front/vendor/select2/js/select2.min.js" type="711dde6a56fdbf3b9a7f3eae-text/javascript"></script>
<script>
    const myModal = new bootstrap.Modal('#bd-example-modal');
    myModal.show()

    setTimeout(() => {
        alert('popup !');
    }, 3000);


</script>


<script src="/front/js/custom.js" type="text/javascript"></script>



@livewireScripts
@stack('js')
</body>

<!-- Mirrored from askbootstrap.com/preview/groci/theme-three/single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2023 11:58:20 GMT -->
</html>
