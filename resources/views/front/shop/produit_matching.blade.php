@extends('front.base')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4">
                <livewire:compare-basket />
            </div>
            <div class="col-12 col-md-4">
                <livewire:compare-basket />
            </div>
            <div class="col-12 col-md-4">
                <livewire:compare-basket />
            </div>
        </div>
    </div>


@endsection
