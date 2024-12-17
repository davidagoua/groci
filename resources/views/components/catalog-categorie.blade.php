<div x-data="{
    enfants: [],
    loading: false,
    selectedId: null,
    async getCategorieEnfants(id){
        this.enfants = []
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
        <div class="col-md-4 border-b border-none border" style="max-height: 80vh; overflow-y: scroll">
            @foreach($categorie->enfants()->get() as $scat)
            <a class="d-block p-1 mt-2 rounded shadow bg-white text-center"  :style="selectedId === {{$scat->id}} ? 'border: 5px solid red ' : ''  " href="#" @click.prevent="getCategorieEnfants({{$scat->id}})">
               <div class="d-flex align-items-center">
                   <div class="d-flex flex-grow-1 flex-column">
                       <img style="height: 100px; width: auto" src="{{ asset('/storage/'.$scat->image) }}" alt="">
                       {{ $scat->name }}
                   </div>
                   <span class="mdi mdi-chevron-right"></span>
               </div>
            </a>
            @endforeach
        </div>
        <div class="col-md-4">
            <div x-show="loading" class="text-center w-full h-full">
                <span class="mdi mdi-loading mdi-spin"></span>
            </div>
            <div x-show="enfants.length > 0" x-transition>

                <template x-for="enfant in enfants" :key="enfant.id">
                    <a :href="'{{ route('front.shop.search') }}?cats[0]='+enfant.id +'&parent=enfant.parent_id'" class="d-block mb-2 shadow bg-white rounded align-items-center p-1 d-flex align-items-center ">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <img  style="height: 70px; width: 70px" :src="enfant.image" class="mr-3" alt="" >
                            <span x-text="enfant.nom"></span>
                        </div>
                        <span x-show="enfant.has_child" class="mdi mdi-chevron-right"></span>
                    </a>
                </template>

            </div>
        </div>
    </div>
</div>
