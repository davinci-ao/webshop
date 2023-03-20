    @extends('layouts.app')
    @section('content')
        <div class="container">
            @if (isset($carts[0]->name))
                <h5 class="card-title mb-3 text-reset">{{$carts[0]->name}}'s shopping cart</h5>
                <div class="row">
                    @foreach($carts as $cart)
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                    <img class="card-img" src="{{url('/images' . '/' . $cart->file_path)}}"/>
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="mb-3">{{$cart->product_name}}</h6>
                                    <div class="text-reset">
                                        @if ($cart->category)
                                        <p>{{$cart->category}}</p>
                                        @endif
                                    </div>
                                    <h6 class="mb-3">${{$cart->price}}</h6>
                
                            
                                </div>
                            </div>
                        </div>      
                    @endforeach
                </div>
                @else
                cart is empty.
            @endif
        </div> 
    @endsection