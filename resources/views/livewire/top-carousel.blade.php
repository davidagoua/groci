<div>
    <section class="carousel-slider-main text-center border-top border-bottom bg-white">
        <div class="owl-carousel owl-carousel-slider owl-theme" style="opacity: 1; display: block;">
            <div class="owl-wrapper-outer">
                <div class="owl-wrapper"
                     style="width: 11384px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">
                    @foreach($bannieres as $b)
                    <div class="owl-item" style="width: 1423px;">
                        <div class="item">
                            <a href="{{ route('front.home') }}"><img height="400px" class="img-fluid" src="{{ asset('/storage/'.$b->image) }}"
                                                     alt="{{ $b->captions }}"></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="owl-controls clickable">
                <div class="owl-pagination">
                    @foreach($bannieres as $b)
                    <div class="owl-page active"><span class=""></span></div>
                    <div class="owl-page"><span class=""></span></div>
                    <div class="owl-page"><span class=""></span></div>
                    <div class="owl-page"><span class=""></span></div>
                    @endforeach
                </div>
                <div class="owl-buttons">
                    <div class="owl-prev"><i class="mdi mdi-chevron-left"></i></div>
                    <div class="owl-next"><i class="mdi mdi-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </section>
</div>
