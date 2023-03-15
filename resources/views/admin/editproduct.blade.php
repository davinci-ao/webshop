@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row">
                <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm mx-4 my-4">+ Add product</a>
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                    <img class="card-img" src="{{url('/images' . '/' . $product->file_path)}}"/>
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-3 text-reset">{{$product->name}}</h5>
                                        <div class="text-reset">
                                            @if ($product->category)
                                                <p>{{$product->category->name}}</p>
                                            @endif
                                            </div>
                                            <h6 class="mb-3">${{$product->price}}</h6>
                                            <a href="{{ url('/product/' . 'details/' . $product->id) }}" class="btn btn-dark btn-sm">See {{$product->name}}</a>
                                            <br>
                                            <hr>
                                            <br>
                                            <a href="{{ url('/product/edit/' . $product->id) }}" class="btn btn-success btn-sm">edit {{$product->name}}</a>
                                            <br>
                                            <hr>
                                            <br>
                                            <a href="{{ url('/product/delete/' . $product->id) }}" class="btn btn-danger btn-sm">Delete {{$product->name}}</a>
                                        </div>
                                    </div>
                                </div>      
                    @endforeach
                </div>
            </div> 
@endsection