@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Orders</h1>

        @if (isset($orders) && count($orders) > 0)
            <ul class="list-group">
                @foreach ($orders as $order)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Order ID: {{ $order->id }}</h3>
                                <p>User ID: {{ $order->user_id }}</p>
                                <p>Username: {{ $order->username }}</p>
                                <p>Email: {{ $order->email }}</p>
                                <p>Total Price: €{{ $order->total_price }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Items:</h4>
                                <ul class="list-group">
                                    @foreach ($order->products as $product)
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <p>Product ID: {{ $product->id }}</p>
                                                    <p>Product Name: {{ $product->name }}</p>
                                                    <p>Quantity: {{ $product->pivot->quantity }}</p>
                                                </div>
                                                <a href="{{ url('/product/details/' . $product->id . '/' . $product->category_id) }}" class="btn btn-primary">View Product</a>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No orders found.</p>
        @endif
    </div>
@endsection
