@extends('layouts.app')
@section('content')
    <div class="container py-5">
      <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card text-black">
            <img class="card-img"  src="{{url('/images' . '/' . $product->file_path)}}"/>
            <div class="card-body">
              <div class="text-center">
                <h2 class="text mb-4">{{$product->name}}</h2>
              </div>
              <div class="text-center">
                <p class="text-muted mb-4">{{$product->description}}</p>
              </div>
              <div>
                <hr>
                <div class="d-flex justify-content-between">
                  <span>Price</span><span>${{$product->price}}</span>
                </div>
                <div class="text-center">
                  {{-- <span>Stock</span><span>{{$product->stock}}</span> --}}
                  @if ($product->stock < 1)
                  <h6 class="mb-3 text-danger">out of stock</h6>
              @elseif ($product->stock < 4)
                  <h6 class="mb-3 text-warning">Only a few left in stock</h6>
              @else
                  <h6 class="mb-3 text-success">in stock</h6>
              @endif
              <form action="{{ url('cart/index/' . $product->id) }}" method="post">
                  {!! csrf_field() !!}
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <input type="submit" value="Add to cart" class="btn btn-sm btn-dark"> 
                  <input type="number" class="form-control.form-horizontal w-25" name="quantity" value="1" min="1"><br>
                  <br>
              </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col card">
        <hr>
      <h1 class="text-center">Related for you</h1>
      <hr>
      <ul class="list-group">
      <div class="row"> 
          @foreach($categoryProducts as $categoryProduct)
          <div class='col-sm-4'>
          <li class="list-group-item mt-3">
          <a href="{{ url('/product/' . 'details/' . $product->id . '/' . $product->category_id) }}"> 
                      <img class="img" src="{{url('/images' . '/' . $categoryProduct->file_path)}}"/>
                        <h5 class="card-title">{{$categoryProduct->name}}</h5>
                          <h6 class="mb-3">Price: ${{$categoryProduct->price}}</h6>
                          </a>  
                          @if ($categoryProduct->stock < 1)
                              <h6 class="mb-3 text-danger">Out of stock</h6>
                          @elseif ($categoryProduct->stock < 4)
                              <h6 class="mb-3 text-warning">Only a few left in stock</h6>
                          @else
                              <h6 class="mb-3 text-success">In stock</h6>
                          @endif
                          @if(Auth::check() && Auth::user()->admin == "1")
                                <a href="{{ url('/product/edit/' . $product->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ url('/product/delete/' . $product->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                                <hr>                     
                                <form action="{{ url('product/storeStockOfProduct/' .$product->id) }}" method="post">
                                <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
                                <form action="{{ url('cart/index/' . $product->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    <label>Stock:</label></br>
                                    <div class="input-group">
                                        <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
                                        <input type="text" name="stock" id="stock" value="{{$product->stock}}" class="form-control"><br>
                                        <input type="submit" value="Update stock" class="btn btn-success btn-sm"><br>
                                    </div>
                                </form>
                            @endif  
                           
                            @if(Auth::check() && Auth::user()->admin == "0")
                                <form action="{{ url('cart/index/' . $product->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="input-group">
                                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                        <input type="number" class="form-control.form-horizontal w-25" name="quantity" value="1" min="1">
                                        <button type="submit" class="btn btn-sm btn-dark"><i class="fa-solid fa-cart-shopping"></i></button>
                                    </div>
                                </form>
                                @endif
                                @guest
                                <form action="{{ url('cart/index/' . $product->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="input-group">
                                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                        <input type="number" class="form-control.form-horizontal w-25" name="quantity" value="1" min="1">
                                        <button type="submit" class="btn btn-sm btn-dark"><i class="fa-solid fa-cart-shopping"></i></button>
                                    </div>
                                </form>
                                @endguest
                          <input type="hidden" name="id" id="id" value="{{$categoryProduct->id}}"/> 
            </li>  
            </div>
          @endforeach
      </div>
  </div>
</div>
@endsection