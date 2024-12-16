<div>

    @foreach($categorie->enfants()->orderBy('order')->get() as $scat)
        <a
            hx-get="/get-child/{{ $categorie->id }}"
            x-show="'{{$scat->name}}'.toLowerCase().indexOf(q.toLowerCase()) !== -1"  href="{{ route('front.shop.search') }}?cats[0]={{ $scat->id }}&parent={{$categorie->id}}"
            class="col-md-4 col-12  mt-3 category-card">
            <div data-aos="flip-left" data-aos-easing="ease-in-back" class="p-3  bg-white text-center" >
                <img class="img-fluid" style="border: 5px solid red; border-radius: 7px;height: 140px"
                     src="{{ asset('/storage/'.$scat->image) }}" width="220px" >
                <div>
                    <h6 class="p-3">{{ $scat->name }}</h6>
                </div>
            </div>
        </a>
    @endforeach
</div>
