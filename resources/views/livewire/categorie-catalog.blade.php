<div class="" style="max-height: 85vh; overflow-y: scroll">
    <div class="text-left flex ">
        <div class=""    >
            @foreach($categories as $categorie)
            <div class="text-left" wire:click="selectCategorie({{ $categorie->id }})">
                <div class="text-center  p-2">
                    <img class="img-fluid" style="border: 5px solid red; border-radius: 7px;height: 140px"
                         src="{{ asset('/storage/'.$categorie->image) }}" width="auto" >
                    <div class="mt-3">{{ $categorie->name }}</div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-left">
            @foreach($sous_categories as $scategorie)
                <div class="" wire:click="selectSousCategorie({{ $scategorie->id }})">
                    <div class="text-center  p-2">
                        <img class="img-fluid" style="border: 5px solid red; border-radius: 7px;height: 140px"
                             src="{{ asset('/storage/'.$scategorie->image) }}" width="auto" >
                        <div class="mt-3">{{ $scategorie->name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
