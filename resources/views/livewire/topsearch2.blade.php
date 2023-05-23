<div >
    <select wire:model="selectedProduit" class="form-control text-black p-4 border-0 rounded-0" placeholder="Selectionner un produit"
           aria-label="Recherche..." type="text">
        <option value="Tous" selected>Tous les produits</option>
        @foreach($produits as $prod)
    <option value="{{ $prod->id }}">
                <div class="d-block" href="{{ route('front.shop.produit_details', ['produit'=>$prod]) }}">{{ $prod->nom }} <span class="text-danger">({{$prod->unite}})</span></div>
    </option>
        @endforeach
    </select>
</div>

