@extends('Website.partials.layout')
@section('content')
    @livewireStyles

    @livewire('stores.store-details', ['store_type_slug' => $store_type_slug, 'store_name_slug' => $store_name_slug])

    @livewireScripts
@endsection

