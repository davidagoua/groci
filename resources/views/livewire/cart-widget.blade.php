
<div>
    <li class="list-inline-item ">
        <a href="#" data-toggle="offcanvas" class="btn btn-link border-none"> <img src="{{ asset('nimages/panier.png') }}" alt=""></a>
    </li>
    <div>
        <div class="cart-sidebar">
            <div class="cart-sidebar-header">
                <h5>
                    Panier <span class="text-success">({{ $panier_count }} Produits)</span> &nbsp;&nbsp; <a data-toggle="offcanvas" class="float-right" href="#"><i class="mdi mdi-close"></i>
                    </a>
                </h5>
            </div>
            <div class="cart-sidebar-body">
                @foreach($viewable as $proposition)
                <div class="cart-list-product">
                    <a class="float-right remove-cart" href="#"><i class="mdi mdi-close"></i></a>
                    <img class="img-fluid" src="{{ asset('/storage/'.$proposition->produit->image()->path) }}" alt="">
                    <h5><a href="#">{{ $proposition->produit->nom }}</a></h5>
                    <h6><strong><span class="mdi mdi-approval"></span> {{ $proposition->boutique->nom }}</strong> </h6>
                    <p class="offer-price mb-0">{{ $proposition->prix }} FCFA x {{ $proposition->quantity }} </p>
                </div>
                @endforeach
            </div>

            <div class="cart-sidebar-footer">
                <div class="cart-store-details">
                    <h6>Montant Total &nbsp;&nbsp; <strong class="float-right text-danger">{{ $total }} FCFA</strong></h6>
                </div>
                <a href="{{ route('front.shop.comparaison')}}" class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Comparer </span><span class="float-right"><strong>{{ $total }} FCFA</strong> <span class="mdi mdi-chevron-right"></span></span></button>
                <a href="{{ route('shop.clear-cart') }}" class="btn btn-dark btn-lg btn-block text-left" type="button"><span class=""><i class="mdi mdi-trash-outline"></i>Vider le panier</span> </a>
            </div>
        </div>
    </div>


</div>

