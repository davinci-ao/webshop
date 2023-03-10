@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-12 mt-3" >
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Product: {{$product->name}}</h5>
                {{-- <p class="card-text">Seller: {{$product->seller->name}}</p> --}}
                {{-- <a href="{{ route('getProductById', [$product->id])}}" class="btn btn-primary">see info of the product: {{$product->name}}</a> --}}
                @auth
                {{-- <a href="{{ url('/playlists/playlist_song/' . $song->id ) }}" class="btn btn-success btn-sm"> add song to playlist </a>
                <a href="{{ url('/queues/index/' . $song->id ) }}" class="btn btn-success btn-sm"> add song to Queue </a> --}}
                @endauth
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection