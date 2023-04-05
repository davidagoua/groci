<div>
    <section class="top-category section-padding">
        <div class="container">
            <div class="owl-theme" style="opacity: 1; display: block;">
                <div class="">
                    <div class="row">
                        @foreach($items as $item)
                        <div class="col" style="width: 139px;">
                            <div class="item">
                                <div class="category-item">
                                    <a href="">
                                        <img class="img-fluid" src="{{ asset('/storage/'.$item->image) }}" alt="">
                                        <h6>{{ $item->name }}</h6>
                                        <p>{{ $item->produits()->count() }} Produits</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
