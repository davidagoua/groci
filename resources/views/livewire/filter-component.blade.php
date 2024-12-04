<div>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div >
                    @foreach($categories as $categorie)
                        <input wire:model="filter_categorie" type="checkbox" value="{{ $categorie->id }}">{{ $categorie->name }}
                    @endforeach
                </div>
            </div>
            <div class="col">
                <div>
                    <div class="row items-stretch">
                        @forelse($produits as $produit)
                            <div class="col-3">
                                <x-product-card :produit="$produit"/>
                            </div>
                        @empty
                            <span>Aucuns produits disponible</span>
                        @endforelse
                    </div>
                </div>
                <p class="text-center">
                    {{ $produits->links() }}
                </p>
            </div>
        </div>
    </div>
</div>
