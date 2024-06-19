@extends('front.base')

@section('content')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <div class="container-fluid" x-data="{nbCase: 2}">
        <div class="row"><div class="flex-1"></div><div><button class="btn btn-secondary" @click="nbCase++">Ajouter</button></div></div>
        <div class="row">
            <div x-for="nb in nbCase" class="col-12 col-md-4">
                <livewire:compare-basket />
            </div>
      
        </div>
    </div>


@endsection
