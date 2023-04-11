<div>
    <div class="owl-item"><div class="item">
            <div class="product">
                <a href="{{ route('front.shop.produit_details', ['produit'=>$produit]) }}">
                    <div class="product-header">
                        <img class="img-fluid" src="{{ asset('/storage/'. $produit->image()->path) }}" alt="">
                    </div>
                    <div class="product-body">
                        <h5>{{ $produit->nom }}</h5>
                    </div>
                    <div class="product-footer">
                        <p class="offer-price mb-0">{{ $produit->propositions()->min('prix') }} - {{ $produit->propositions()->max('prix') }} FCFA <i class="mdi mdi-tag-outline"></i> </p><a href="{{ route('front.shop.produit_details', ['produit'=>$produit]) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-cart-outline"></i>Ajouter</a>
                    </div>
                </a>
            </div>
        </div></div>
</div>
