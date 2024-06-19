

<div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="">Boutique</label>
                <select name="" id="" wire:model="boutique" class="form-control">
                    <option value="">Choisissez une boutique</option>
                    @foreach($boutiques as $b)
                    <option value="{{ $b->id }}">{{ $b->nom }}</option>

                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div>
        @if($boutique != null )
        <span class="p-1 bg-secondary text-white w-100 d-block">
            {{ count($viewable) }} / {{ $panier_count }} produits disponibles
        </span>
        @endif
    </div>
    <div class="card">
        <div class="card-body text-center">
            <div wire:loading class="text-center w-full">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            @if($boutique != null && $panier_count > 0)
            <ul style="max-height: 450px; overflow-y: scroll" class="list-group h-100">
                @foreach($viewable as $proposition)
                    <li class="cart-list-product">
                        <a class="float-right remove-cart" href="#"><i class="mdi mdi-close"></i></a>
                        <img class="img-fluid" src="{{ asset('/storage/'.$proposition->produit->image()->path) }}" alt="">
                        <h5><a href="#">{{ $proposition->produit->nom }}</a></h5>
                        <h6><strong><span class="mdi mdi-approval"></span> {{ $proposition->boutique->nom }}</strong> </h6>
                        <p class="offer-price mb-0">{{ $proposition->prix }} FCFA x {{ $proposition->quantity }} </p>
                    </li>
                @endforeach
            </ul>
            <div class="cart-sidebar-footer">
                <div class="cart-store-details">
                    <h6>Montant Total <strong class="float-right text-danger">{{ $total }} FCFA</strong></h6>
                </div>
                <button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceder au paiement </span><span class="float-right"><strong>{{ $total }} FCFA</strong> <span class="mdi mdi-chevron-right"></span></span></button>
            </div>
            @endif
        </div>
    </div>

</div>

