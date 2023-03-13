@extends('layouts.app')
@section('content')
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card text-black">
            <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/belt.webp"
              class="card-img-top" alt="Apple Computer" />
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
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection

