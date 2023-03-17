@extends('layouts.app')
@section('content')
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card text-black">
            <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
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
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection

