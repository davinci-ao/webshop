@extends('layouts.app')

@section('content')
    <h1>My Orders</h1>

    @if (isset($orders) && count($orders) > 0)
    <ul>
        @foreach ($orders as $order)
            <li>
                Order ID: {{ $order->id }} <br>
                user ID: {{ $order->user_id }} <br>
                username: {{ $order->username }} <br>
                email: {{ $order->email }} <br>
                product_id: {{ $order->product_id }} <br>
                Total Price: {{ $order->total_price }} <br>
                quantity: {{ $order->quantity }}
            </li>
            <hr>
        @endforeach
    </ul>
@else
    <p>No orders found.</p>
@endif


@endsection