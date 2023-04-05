<div>
    <li class="list-inline-item cart-btn">
        <a href="#" data-toggle="offcanvas" class="btn btn-link border-none"><i class="mdi mdi-cart"></i> Panier <small class="cart-value">{{ $panier_count }}</small></a>
    </li>
    <div>
        <div class="cart-sidebar">
            <div class="cart-sidebar-header">
                <h5>
                    Panier <span class="text-success">({{ $panier_count }} Produits)</span> <a data-toggle="offcanvas" class="float-right" href="#"><i class="mdi mdi-close"></i>
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
                    <h6>Montant Total <strong class="float-right text-danger">{{ $total }} FCFA</strong></h6>
                </div>
                <button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceder au paiement </span><span class="float-right"><strong>{{ $total }} FCFA</strong> <span class="mdi mdi-chevron-right"></span></span></button>
                <button wire:click="clear_cart" class="btn btn-dark mt-1 btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-trash-outline"></i>Vider le panier</span> </button>
            </div>
        </div>
    </div>

    <script>
        Livewire::on('panier_vider', ()=>{
            window.location = window.location
        })
    </script>
</div>
