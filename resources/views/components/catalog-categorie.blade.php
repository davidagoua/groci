<div x-data="{
    enfants: [],
    loading: false,
    selectedId: null,
    async getCategorieEnfants(id){
        this.selectedId = id
        try{
            this.loading= true
            const response = await ( await fetch('/api/categorie/'+id+'/children')).json()
            this.enfants = response.data
            console.log(this.enfants)
        }catch(e){
            console.error(e)
        }finally{
            this.loading = false
        }

    }
}">
    <div class="d-flex row">
        <div class="col-md-4 border-b border-none border">
            @foreach($categorie->enfants()->get() as $scat)
            <a class="d-block p-1 mt-2 rounded shadow bg-white text-center" href="#" @click.prevent="getCategorieEnfants({{$scat->id}})">
               <div class="d-flex align-items-center">
                   <div class="d-flex flex-grow-1 flex-column">
                       <img style="height: 100px" src="{{ asset('/storage/'.$scat->image) }}" alt="">
                       {{ $scat->name }}
                   </div>
                   <span class="mdi mdi-chevron-right"></span>
               </div>
            </a>
            @endforeach
        </div>
        <div class="col-md-4">
            <div x-show="loading" class="text-center w-full">
                <span class="fa fa-spin fa-loading"></span>
            </div>
            <div x-show="enfants.length > 0" >

                <template x-for="enfant in enfants" :key="enfant.id">
                    <a :href="'{{ route('front.shop.search') }}?cats[0]='+enfant.id +'&parent=enfant.parent_id'" class="d-block shadow bg-white rounded align-items-center d-flex align-items-center ">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <img  style="height: 70px; width: 70px" :src="enfant.image" class="mr-3" alt="" >
                            <span x-text="enfant.nom"></span>
                        </div>
                        <span class="mdi mdi-chevron-right"></span>
                    </a>
                </template>

            </div>
        </div>
    </div>
</div>