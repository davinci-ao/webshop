@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-12 mt-3" >
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Product: {{$product->name}}</h5>
                <p class="card-text">category: {{$product->category->name}}</p>
                {{-- <a href="{{ route('getSongById', [$song->id])}}" class="btn btn-primary btn-sm">see info of {{$song->name}}</a> --}}
                @auth
                    {{-- <a href="{{ url('/playlists/playlist_song/' . $song->id ) }}" class="btn btn-success btn-sm"> add song to playlist </a> --}}
                @endauth
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection