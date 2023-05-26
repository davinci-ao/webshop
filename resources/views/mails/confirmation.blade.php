<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X UA-Compatible" content="ie=edge">
        <title>Order confirmation</title>
    </head>
    <body>
        <p>Hi {{$order->firstname}} {{$order->lastname}}</p>
        <p>Your order has been successfully placed</p>
        <br>

        <table style="width: 600px; text-align:right">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td><img class="img" src="{{url('/images' . '/' . $product->file_path)}}"/></td>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price * $item->quantity}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td>${{$order->subtotal}}</td>
                </tr>
            </tbody>
        </table>
    </body>