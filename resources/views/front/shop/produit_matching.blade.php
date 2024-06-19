@extends('front.base')

@section('content')

    <div class="container-fluid" x-data={nbCase: 2}>
        <div class="row">
            <div x-for="nb in nbCase" class="col-12 col-md-4">
                <livewire:compare-basket />
            </div>
      
        </div>
    </div>


@endsection
