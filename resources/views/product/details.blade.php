@extends('layouts.app')
@section('content')
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card text-black">
            <img class="card-img"  src="{{url('/images' . '/' . $product->file_path)}}"/>
            <div class="card-body">
              <div class="text-center">
                <p class="text-muted mb-4">{{$product->name}}</p>
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
    </div>
    <hr>
    <div class="container">
      <h1 class="text-center">related for you</h3>
    </div>
    <hr>
    <div class="container">
      <div class="row">
          @foreach($categoryPoducts as $categoryPoduct)
              <div class="col-lg-2 col-md-12 mb-4">
                  <div class="card">
                      <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                          <img class="card-img" src="{{url('/images' . '/' . $categoryPoduct->file_path)}}"/>
                          <a href="#!">
                              <div class="hover-overlay">
                                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                              </div>
                          </a>
                      </div>
                      
                      <div class="card-body">
                          <h5 class="card-title mb-3 text-reset">{{$categoryPoduct->name}}</h5>
                          <div class="text-reset">
                              @if ($categoryPoduct->category)
                              <p>{{$categoryPoduct->category->name}}</p>
                              @endif
                          </div>
                          <h6 class="mb-3">${{$categoryPoduct->price}}</h6>
                          @if ($categoryPoduct->stock < 1)
                              <h6 class="mb-3 text-danger">Out of stock</h6>
                          @elseif ($categoryPoduct->stock < 4)
                              <h6 class="mb-3 text-warning">Only a few left in stock</h6>
                          @else
                              <h6 class="mb-3 text-success">In stock</h6>
                          @endif
                          
                          <input type="hidden" name="id" id="id" value="{{$categoryPoduct->id}}"/>
                          <a href="{{ url('/product/' . 'details/' . $categoryPoduct->id . "/" . $categoryPoduct->category_id) }}" class="btn btn-dark btn-sm">See {{$product->name}}</a>
                      </div>
                  </div>
              </div>      
          @endforeach
      </div>
  </div>       
    @endsection

