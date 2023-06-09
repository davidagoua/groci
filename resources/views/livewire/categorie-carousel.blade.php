<div>


    <section class="top-category section-padding">
        <div class="container">
            <div class="owl-carousel owl-carousel-category owl-theme" style="opacity: 1; display: block;">
               @foreach($items as $item)
                <div class="owl-item" style="width: 139px;">
                            <div class="item">
                                <div class="category-item">
                                    <a href="{{ route('front.shop.search') }}?cats[0]={{ $item->id }}">

                                        <p>{{ $item->produits->count() }} Produits</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach

            </div>
        </div>
    </section>

    <script>
        var owlcat = $('.owl-carousel-cat');
        owlcat.owlCarousel({
            items: {{ $items->count() }},
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true
        });
    </script>
</div>
