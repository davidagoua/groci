<div>
    <section class="carousel-slider-main text-center border-top border-bottom bg-white">
        <div class="owl-carousel-top owl-carousel-slider owl-theme" style="opacity: 1; display: block;">

                    @foreach($bannieres as $ban)

                        <div class="owl-item" style="width: 1423px;">
                            <div class="item">
                                <a href="#"><img class="img-fluid" src="{{ asset('/storage/'.$ban->image) }}"
                                                 alt="First slide"></a>
                            </div>
                        </div>
                    @endforeach

        </div>
    </section>


    <script>

        var owltop = $('.owl-carousel-top');
        owltop.owlCarousel({
            items:{{ $bannieres->count() }},
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true
        });



    </script>
</div>
