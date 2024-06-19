@extends('front.base')

@section('content')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <div class="container-fluid" x-data="{nbCase: 2}">
        <div class="row p-3"><div class="flex-grow-1"></div><div><button class="btn btn-secondary" @click="nbCase++">Ajouter</button></div></div>
        <div class="row">
            <template x-for="i in nbCase">
                <div class="col-12 col-3">
                    <livewire:compare-basket />
                </div>
            </template>
            
      
        </div>
    </div>


@endsection
