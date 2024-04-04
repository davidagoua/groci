@extends('front.base')

@section('content')

    <livewire:another-top-bar/>

    <div class="p-5" style="background-image: url({{ asset('nimages/car1.png') }}); background-size: cover; background-repeat: no-repeat">
        <p class="m-4 text-center">&nbsp;
        <h4 class="text-white text-center">Pour toutes questions ?</h4>
            <h1 style="font-size: 5em; color: white !important;" class="text-white text-center">CONTACTEZ-NOUS</h1>
        </p>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">

                    <div>
                        <div>
                            <img src="{{ asset('images/logo.jpg') }}" alt="" width="250">

                        </div>
                        <div>
                            <div class="d-flex">
                                <h5 class="text-dark"><i class="mdi mdi-phone"></i> </h5> &nbsp;&nbsp;
                                <h5>+225 27 24 35 58 17</h5>
                            </div>
                            <div class="d-flex">
                                <h5 class="text-dark"><i class="mdi mdi-email"></i> </h5> &nbsp;&nbsp;
                                <h5>support@c-moinscher.ci </h5>
                            </div>

                            <p>
                            <span class="p-2 rounded text-white" style="background-color: #00d084">
                                <span class="mdi mdi-phone"></span>
                            Numero Vert gratuit 1343</span>
                            </p>
                        </div>
                    </div>
                    <div class="mt-5">
                        <p>
                            <h4 class=" font-weight-bold">Partenaire Communication</h4>
                        </p>
                        <div>
                            <img src="{{ asset('images/common.png') }}" alt="" width="250">

                        </div>
                        <div>
                            <div class="d-flex">
                                <h5 class="text-dark"><i class="mdi mdi-phone"></i> </h5> &nbsp;&nbsp;
                                <h5>+225 27 22 41 16 62</h5>
                            </div>

                            <div class="d-flex">
                                <h5 class="text-dark"><i class="mdi mdi-phone"></i> </h5> &nbsp;&nbsp;
                                <h5>+225 27 22 41 17 64</h5>
                            </div>

                            <div class="d-flex">
                                <h5 class="text-dark"><i class="mdi mdi-email"></i> </h5> &nbsp;&nbsp;
                                <h5>direction@comon.ci </h5>
                            </div>

                            <div class="d-flex">
                                <h5 class="text-dark"><i class="mdi mdi-home-map-marker"></i> </h5> &nbsp;&nbsp;
                                <h5>2 Plateaux - vallons, Rue des jardins 28 BP 1073 Abidjan 28 </h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <form class="col-lg-12 col-md-12" name="sentMessage" id="contactForm" novalidate="">


                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Adresse Email <span class="text-danger">*</span></label>
                                <input type="email" placeholder="" class="form-control" id="email" required="" data-validation-required-message="Please enter your email address.">
                                <div class="help-block"></div></div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Nom & Prenoms <span class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="nom" required="" data-validation-required-message="Please enter your email address.">
                                <div class="help-block"></div></div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Téléphone<span class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="telephone" required="" data-validation-required-message="Please enter your email address.">
                                <div class="help-block"></div></div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Message <span class="text-danger">*</span></label>
                                <textarea rows="4" cols="100" placeholder="Message" class="form-control" id="message" required="" data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                                <div class="help-block"></div></div>
                        </div>
                        <div id="success"></div>

                        <button class="btn btn-lg bg-ownred px-5 ml-2 rounded-0 rounded-0 tewt-white" type="submit" style=" color: white !important;">ENVOYEZ</button>
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
