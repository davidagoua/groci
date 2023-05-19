@extends('front.base')

@section('content')

    <livewire:another-top-bar/>

    <div class="p-5" style="background-image: url({{ asset('nimages/car1.png') }}); background-size: cover; background-repeat: no-repeat">
        <p class="m-4 text-center">&nbsp;
            <h1 style="font-size: 5em; color: white !important;" class="text-white text-center">CONTACTEZ-NOUS</h1>
        </p>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h6 class="text-dark"><i class="mdi mdi-home-map-marker"></i> Infoline du Secretariat technique :</h6>
                    <p>Abidjan Cocody Angré, 8ème Tranche Cité Djibi 1, 06 BP 1178
                        Abidjan 06</p>
                    <h6 class="text-dark"><i class="mdi mdi-user"></i> Support :</h6>
                    <p> KAEDABI GROUPE INTERNATIONAL SA</p>
                    <h6 class="text-dark"><i class="mdi mdi-phone"></i> Tél :</h6>
                    <p>+225 27 24 35 58 17</p>
                    <h6 class="text-dark"><i class="mdi mdi-phone"></i> Fax :</h6>
                    <p>(225) 123-0247</p>

                    <h6 class="text-dark"><i class="mdi mdi-email"></i> Email :</h6>
                    <p>mkmorris@kaedabi.com</p>

                </div>
                <div class="col-lg-8 col-md-8">
                    <form class="col-lg-12 col-md-12" name="sentMessage" id="contactForm" novalidate="">


                        <div class="row">

                            <div class="control-group form-group col-md-12">
                                <div class="controls">
                                    <label>Adresse Email <span class="text-danger">*</span></label>
                                    <input type="email" placeholder="" class="form-control" id="email" required="" data-validation-required-message="Please enter your email address.">
                                    <div class="help-block"></div></div>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Message <span class="text-danger">*</span></label>
                                <textarea rows="4" cols="100" placeholder="Message" class="form-control" id="message" required="" data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                                <div class="help-block"></div></div>
                        </div>
                        <div id="success"></div>

                        <button class="btn bg-ownred px-5 ml-2 rounded-0 rounded-0 tewt-white" type="submit" style=" color: white !important;">ENVOYEZ</button>
                    </form>
                </div>
            </div>
        </div>
    </section>



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
