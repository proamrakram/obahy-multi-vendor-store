@extends('Website.partials.layout')
@section('content')
    @livewireStyles

    @livewire('stores.index', ['store_type_slug' => $store_type_slug, 'products' => $products, 'store_name_slug' => $store_name_slug ?? 'null'])

    @livewireScripts
@endsection

