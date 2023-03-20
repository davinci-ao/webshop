@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="dropdown">
            <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Sort products
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ url('/product')}}" class="btn btn-dark btn-sm">Default</a></li>
                <li><a class="dropdown-item" href="{{ url('/product/sortOnPriceHigh')}}" class="btn btn-dark btn-sm">Price (high)</a></li>
                <li><a class="dropdown-item" href="{{ url('/product/sortOnPriceLow')}}" class="btn btn-dark btn-sm">Price (low)</a></li>
                <li><a class="dropdown-item" href="{{ url('/product/sortOnNameHigh')}}" class="btn btn-dark btn-sm">Name (A-Z)</a></li>
                <li><a class="dropdown-item" href="{{ url('/product/sortOnNameLow')}}" class="btn btn-dark btn-sm">Name (Z-A)</a></li>
            </ul>
        </div>
        <div class="row">
        @if(Auth::check() && Auth::user()->admin == "1")
            <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm mx-4 my-4">+ Add product</a>
        @endif  
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
<<<<<<< HEAD
                            </div>
                            <h6 class="mb-3">${{$product->price}}</h6>
                            @if ($product->stock < 1)
                                <h6 class="mb-3 text-danger">Out of stock</h6>
                            @elseif ($product->stock < 4)
                                <h6 class="mb-3 text-warning">Only a few left in stock</h6>
                            @else
                                <h6 class="mb-3 text-success">In stock</h6>
                            @endif
                            <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
                            <a href="{{ url('/product/' . 'details/' . $product->id . "/" . $product->category_id) }}" class="btn btn-dark btn-sm">See {{$product->name}}</a><br>
                            <br>
                            @if(Auth::check() && Auth::user()->admin == "1")
                                <hr>
                                <form action="{{ url('product/storeStockOfProduct/' .$product->id) }}" method="post">
=======
                                <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
                                <a href="{{ url('/product/' . 'details/' . $product->id . "/" . $product->category_id) }}" class="btn btn-dark btn-sm">See {{$product->name}}</a><br>
                                <br>
                                
                                <form action="{{ url('cart/index/' . $product->id) }}" method="post">
>>>>>>> dev
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
                                    <label>Stock of {{$product->name}}</label></br>
                                    <input type="text" name="stock" id="stock" value="{{$product->stock}}" class="form-control"><br>
                                    <input type="submit" value="Update stock of {{$product->name}}" class="btn btn-success btn-sm"><br>
                                    <hr>
                                </form>
                                <br>
                                <a href="{{ url('/product/edit/' . $product->id) }}" class="btn btn-success btn-sm">edit {{$product->name}}</a>
                                <br>
                                <hr>
                                <br>
                                <a href="{{ url('/product/delete/' . $product->id) }}" class="btn btn-danger btn-sm">Delete {{$product->name}}</a>
                                <br>
                                <hr>
                            @endif  
                            <form action="{{ url('addcart/' . $product->id . "/" . $product->category_id) }}" method="post">
                                {!! csrf_field() !!}
                                <input type="number" value="1" min="1" class="form control" name="amount"><br>
                                <br>
                                <input type="submit" value="Add to cart" class="btn btn-dark"></br>
                            </form>
                        </div>
                    </div>
                </div>      
            @endforeach
        </div>
    </div>       
@endsection