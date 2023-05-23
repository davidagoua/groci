<div class="bg-white">
    <a class="d-block bg-white" href="{{ route('front.shop.produit_details', ['produit'=>$produit]) }}">
        <div class="product-header">
            <img class="img-fluid" src="{{ asset('/storage/'. $produit->image()->path) }}" alt="">
        </div>
        <div class="text-center p-3">
            <div class="">
                <h5>{{ $produit->nom }}</h5>
            </div>
            <div class="product-footer">
                <b class="offer-price mb-0">
                     {{ $produit->unite  }}<br>
                </b>

            </div>

        </div>
        <a href="{{ route('front.shop.produit_details', ['produit'=>$produit]) }}"
           class="btn btn-block rounded-0 text-white p-2 bg-ownred btn-sm">
            <b style="font-size: 1.3em">Comparer</b>
        </a>
    </a>
</div>
