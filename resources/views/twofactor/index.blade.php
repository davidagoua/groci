<!doctype html>
<html lang="en">
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
        body{
            background-image: url({{ asset('images/loginback2.avif') }});
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

    @stack('css')
</head>
<body>
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-md-4 col-12">

            </div>
            <div class="col-md-4 col-12">
                <div class="p-3 bg-white">
                    <form action="{{ route('twofactor.store') }}" method="post">
                        @csrf
                        <div class="mb-3 mt-3 text-center">
                            <h4>Code d'authentification</h4>
                            <p class="text-center">Nous avons envoyé un code sur ce contact : {{ substr(auth()->user()->telephone, 0, 4) . '****' . substr(auth()->user()->contact,  -2) }}</p>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-info alert-block mt-3">

                                    <button type="button" class="close" data-dismiss="alert">×</button>

                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block mt-3">

                                            <button type="button" class="close" data-dismiss="alert">×</button>

                                            <strong>{{ $message }}</strong>
                                        </div>
                            @endif

                            <input type="text" name="code" class="form-control" placeholder="Entrez le code d'authentification">
                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <button class="btn btn-block bg-ownred text-white rounded-0" type="submit">Envoyer</button>
                        <p class="text-right mt-3">
                            <a href="{{ route('twofactor.resend') }}">Renvoyer le code</a>

                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




