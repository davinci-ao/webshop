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
                                        {{-- Deze if statement controleert of de sessie een winkelwagentje bevat. 
                                            De session() functie wordt gebruikt om toegang te krijgen tot de sessiegegevens van de gebruiker, 
                                            en de has() methode controleert of de opgegeven sleutel ('shoppingCart') in dit geval aanwezig is in de sessie. --}}
                                        @if (session()->has('shoppingCart'))
                                        {{-- Deze foreach start een loop waarin elk item in het winkelwagentje wordt herhaalt tot alle items langs zijn gelopen. 
                                            De get() methode wordt gebruikt om de waarde van de key 'shoppingCart' uit de sessie op te halen. 
                                            De loop zal elk element van de array doorlopen en het huidige item wordt gegeven aan de variabele $cartItem --}}
                                            @foreach (session()->get('shoppingCart') as $cartItem)
                                            {{dd($cartItem)}}
                                                
                                                <div class="col-md-8">
                                                    <div class="info">
                                                        <div class="row">
                                                            <table>
                                                                <tr>
                                                                    <th width="40%"></th>
                                                                    <th width="20%">Product</th>
                                                                    <th width="0%">Quantity</th>
                                                                    <th width="20%"></th>
                                                                    <th width="15%">Price</th>
                                                                    <th width="15%">Subtotal</th>
                                                                    <th></th>
                                                                </tr>
                                                                <tr>    
                                                                    <td>
                                                                    <a href="{{ url('/product/' . 'details/' . $cartItem['product']['id'] . '/' . $cartItem['product']['category_id']) }}" style="text-decoration:none; color:black;">
                                                                        <img class="img" src="{{url('/images' . '/' . $cartItem['product']['file_path'])}}">
                                                                    </a>    
                                                                        
                                                                    </td>
                                                                <td>
                                                                    <div class="col-md-5 product-name">
                                                                        <div class="product-name">
                                                                            <a href="{{ url('/product/' . 'details/' . $cartItem['product']['id'] . '/' . $cartItem['product']['category_id']) }}" style="text-decoration:none; color:black;">{{$cartItem['product']['name']}}</a>    
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="col">
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button class="btn btn-sm btn-dark" wire:click="decrementQuantity('{{ $cartItem['product']['id'] }}')">-</button>    
                                                                        <button class="btn btn-sm btn-dark mr-2" wire:click="incrementQuantity('{{ $cartItem['product']['id'] }}')">+</button>
                                                                    </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                <P class="mt-3">{{ $cartItem['quantity'] }}</P>
                                                                </td>
                                                               
                                                                <td>
                                                                    <div class="mt-3">
                                                                        <p>${{$cartItem['product']['price']}}</p>
                                                                    </div>
                                                                    </td>
                                                                <td>
                                                                    <div class="mt-3">
                                                                        <p>  ${{$subTotal = $cartItem['subtotal'] * $cartItem['quantity'] }} </p>
                                                                        <p class="hidetime" style="display: none">{{$totalPrice += $subTotal}}</p>                                               
                                                                    </div>
                                                                </td>
                                                                    <td>
                                                                    <a href="{{'delete/' . $cartItem['product']['id']}}" class="fa fa-trash" style="color: red;"></a>
                                                                    </td>
                                                                </tr>
                                                            </table>
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
                                    <div class='summary-item'><span class='text mx-2'>Total price: </span><span class='price'>${{$totalPrice}}</span></div>
                                    <form action="{{ url('order/information/') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="totalprice" value="{{$totalPrice}}">
                                        @if (is_countable($shoppingCart) && count($shoppingCart) > 0)
                                        <button type="submit" class="btn btn-success mx-4 mb-4">Continue</button>
                                        @else
                                        <br>
                                        <div class="mx-2">Shopping cart is empty </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection