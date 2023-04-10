@extends('front.base')

@push('js')

@endpush

@push('css')

@endpush

@section('content')
    <livewire:produit-details-card :produit="$produit"/>

@endsection
