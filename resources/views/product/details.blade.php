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
          @foreach($categoryPoducts as $categoryPoduct)
          <div class='col-sm-4'>
          <li class="list-group-item mt-3">
                      <img class="img" src="{{url('/images' . '/' . $categoryPoduct->file_path)}}"/>
                        <h5 class="card-title">{{$categoryPoduct->name}}</h5>
                          <h6 class="mb-3">Price: ${{$categoryPoduct->price}}</h6>
                          @if ($categoryPoduct->stock < 1)
                              <h6 class="mb-3 text-danger">Out of stock</h6>
                          @elseif ($categoryPoduct->stock < 4)
                              <h6 class="mb-3 text-warning">Only a few left in stock</h6>
                          @else
                              <h6 class="mb-3 text-success">In stock</h6>
                          @endif
                          
                          <input type="hidden" name="id" id="id" value="{{$categoryPoduct->id}}"/>
                          <a href="{{ url('/product/' . 'details/' . $categoryPoduct->id . "/" . $categoryPoduct->category_id) }}" class="btn btn-dark btn-sm">See product</a>
                          <br><br>  
            </li>  
            </div>
          @endforeach
      </div>
  </div>
</div>
    @endsection