@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/belt.webp" class="w-100" />
                                <a href="#!">
                                    <div class="mask">
                                        <div class="d-flex justify-content-start align-items-end h-100">
                                            <h5><span class="badge bg-primary ms-2">New</span></h5>
                                        </div>
                                    </div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="" class="text-reset">
                                    <h5 class="card-title mb-3">{{$product->name}}</h5>
                                </a>
                                <a href="" class="text-reset">
                                    @if ($product->category)
                                    <p>{{$product->category->name}}</p>
                                    @endif
                                </a>
                                <h6 class="mb-3">${{$product->price}}</h6>
                                <a href="{{ url('/product/' . 'details/' . $product->id) }}" class="btn btn-info btn-sm">see {{$product->name}}</a>
                            </div>
                        </div>
                    </div>      
                @endforeach
            </div>
        </div>       
    @endsection

{{-- @section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-12 mt-3" >
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Product: {{$product->name}}</h5>
                @if ($product->category)
                    <p class="card-text">category: {{$product->category->name}}</p>
                @endif
              
                {{-- <p class="card-text">Category: {{$product->category->name}}</p> --}}
                {{-- <a href="{{ route('getProductById', [$product->id])}}" class="btn btn-primary">see info of the product: {{$product->name}}</a> --}}
                
                {{-- <a href="{{ url('/product/' . 'details/' . $product->id) }}" class="btn btn-info btn-sm">see {{$product->name}}</a> --}}
                {{-- @auth --}}
                {{-- <a href="{{ url('/playlists/playlist_song/' . $song->id ) }}" class="btn btn-success btn-sm"> add song to playlist </a>
                <a href="{{ url('/queues/index/' . $song->id ) }}" class="btn btn-success btn-sm"> add song to Queue </a> --}}
                {{-- @endauth
                </div>
            </div>
            </div> --}}
        {{-- @endforeach --}}
    {{-- </div>
</div> --}}
{{-- @endsection --}} 