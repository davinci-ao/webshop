@extends('layouts.app')
@section('content')
    <div class="container">
        <x-button-box/>
        <br>
        <div class="row">
        <div class="grid-container">
            @foreach($products as $product)
                <x-product-card :product="$product"/>
            @endforeach
            </div>   
        </div>
    </div>       
@endsection