@extends('front.base')

@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h6 class="text-dark"><i class="mdi mdi-home-map-marker"></i> Infoline du Secretariat technique :</h6>
                    <p>2 plateaux Vallons</p>
                    <h6 class="text-dark"><i class="mdi mdi-user"></i> Responsable :</h6>
                    <p>Dr BAH-KONE Ranie-Didice</p>
                    <h6 class="text-dark"><i class="mdi mdi-phone"></i> Tél :</h6>
                    <p>(225) 22 52 68 17</p>
                    <h6 class="text-dark"><i class="mdi mdi-phone"></i> Fax :</h6>
                    <p>(225) 123-0247</p>

                    <h6 class="text-dark"><i class="mdi mdi-email"></i> Email :</h6>
                    <p>info@cnlvc.ci</p>

                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109552.19658195564!2d75.78663251672796!3d30.900473637371658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a837462345a7d%3A0x681102348ec60610!2sLudhiana%2C+Punjab!5e0!3m2!1sen!2sin!4v1530462134939" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding  bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 section-title text-left mb-4">
                    <h2>Contactez-nous</h2>
                </div>
                <form class="col-lg-12 col-md-12" name="sentMessage" id="contactForm" novalidate="">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nom complet <span class="text-danger">*</span></label>
                            <input type="text" placeholder="" class="form-control" id="name" required="" data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group form-group col-md-6">
                            <label>Numéro de téléphone <span class="text-danger">*</span></label>
                            <div class="controls">
                                <input type="tel" placeholder="" class="form-control" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                <div class="help-block"></div></div>
                        </div>
                        <div class="control-group form-group col-md-6">
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

                    <button type="submit" class="btn btn-success">Envoyer</button>
                </form>
            </div>
        </div>
    </section>

@endsection
