@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Results:</h1>
            @if(Auth::check() && Auth::user()->admin == "1")
            <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm">+ Add product</a>
        @endif
        </div>
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