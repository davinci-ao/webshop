@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       
            <div class="col-sm-12 mt-3" >
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Song: {{$product->name}}</h5>
                <p class="card-text">Description: {{$product->description}}</p>
                {{-- <p class="card-text">seller: {{$product->seller->name}}</p> --}}

                @auth
                {{-- <a href="{{ url('/playlists/playlist_song/' . $song->id ) }}" class="btn btn-success btn-sm"> add song to playlist </a> --}}
                @endauth
                </div>
            </div>
            </div>
    </div>
</div>
@endsection