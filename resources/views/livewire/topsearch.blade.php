<div >
    <input wire:model="terme" class="form-control p-4 border-0 rounded-0" placeholder="Selectionner un produit"
           aria-label="Recherche..." type="text">
    @if(strlen($terme) >= 2)
        <div class="bg-white shadow"
             style="position: absolute; z-index: 10; top: 50px; width: 450px; left: 14px; height: 200px; z-index: 100; overflow-y: scroll "
        >
            <ul class="list-group">
                @forelse( $produits as $prod)

                    <li class="list-group-item">
                        <img width="50px" height="50px" src="{{ asset('/storage/'. $prod->image()->path) }}" alt="">
                        <a class="d-block" href="{{ route('front.shop.produit_details', ['produit'=>$prod]) }}">{{ $prod->nom }} <span class="text-danger">({{$prod->unite}})</span></a>
                    </li>
                @empty
                    <li class="list-group-item">
                        Aucun Produit trouvé...
                    </li>
                @endforelse
            </ul>
        </div>
    @endif
</div>

