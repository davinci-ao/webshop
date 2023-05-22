@extends('layouts.app')
@section('content')
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Shopping Cart</h2>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <?php 
                                        $totalPrice = 0;
                                    ?>
                                    <div class="row">
                                        @if (session()->has('shoppingCart'))
                                            @foreach (session()->get('shoppingCart') as $cartItem)
                                                <div class="col-md-3">
                                                    <img class="img-fluid mx-auto d-block image" src="{{url('/images' . '/' . $cartItem['product']['file_path'])}}">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="info">
                                                        <div class="row">
                                                            <div class="col-md-5 product-name">
                                                                <div class="product-name">
                                                                    <a href="#">{{$cartItem['product']['name']}}</a>
                                                                    <div class="product-info">
                                                                        @if ($cartItem['product']['category'])
                                                                            <div>category: <span class="value">{{$cartItem['product']['category']['name']}}</span></div>
                                                                            <a href="{{'delete/' . $cartItem['product']['id']}}" class="fa fa-trash"></a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 quantity">
                                                                <label for="quantity">Quantity:</label>
                                                                <button class="btn btn-sm btn-dark" wire:click="decrementQuantity('{{ $cartItem['product']['id'] }}')">-</button>
                                                                <span>{{ $cartItem['quantity'] }}</span>
                                                                <button class="btn btn-sm btn-dark" wire:click="incrementQuantity('{{ $cartItem['product']['id'] }}')">+</button>
                                                            </div>
                                                            <div class="col-md-3 subtotal">
                                                                <label for="subtotal">subtotal:</label>
                                                                <p>  {{$subTotal = $cartItem['subtotal'] * $cartItem['quantity'] }} </p>
                                                                <p class="hidetime" style="display: none">{{$totalPrice += $subTotal}}</p>                                               
                                                            </div>
                                                            <div class="col-md-3 price">
                                                                <span>${{$cartItem['product']['price']}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <a type='button' href="{{ url('/product') }}" class='btn btn-success btn-block' ><i class="fa-solid fa-arrow-left"></i> continue shopping</a>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-12 col-lg-4'>
                            <div class="summary">
                                <div class="card">
                                    <h3>Summary</h3>
                                    <div class='summary-item'><span class='text'>Total price: </span><span class='price'>${{$totalPrice}}</span></div>

                                    <a type='button' href="{{ url('/order/index') }}" class='btn btn-primary btn-lg btn-block'> <i class="fa-solid fa-credit-card mt-3 mx-3"></i>Checkout</a>
                                    <!-- <a href="{{'delete/'}}" class= 'btn btn-danger bt'>Empty whole cart </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection