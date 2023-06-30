@extends('layouts.app')

@section('content')

<?php
$totalPrice = isset($_POST['totalprice']) ? $_POST['totalprice'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$address2 = isset($_POST['address2']) ? $_POST['address2'] : null;
$postalCode = isset($_POST['postalCode']) ? $_POST['postalCode'] : null;
$city = isset($_POST['city']) ? $_POST['city'] : null;

session(['selectedTime' => $selectedTime]);
session(['email' => $email]);
session(['address' => $address]);
session(['postalCode' => $postalCode]);
session(['city' => $city]);
?>

<div class="container">
<div class="d-flex align-items-end">
   <form action="{{ url('order/delivery') }}" method="POST" id="form">
      @csrf
      <input type="hidden" name="totalprice" value="{{$totalPrice}}">
      <input type="hidden" name="email" value="{{$email}}">
      <input type="hidden" name="address" value="{{$address}}">
      <input type="hidden" name="address2" value="{{$address2}}">
      <input type="hidden" name="postalCode" value="{{$postalCode}}">
      <input type="hidden" name="city" value="{{$city}}">
      <button type="submit" class="btn btn-success m-3"><i class="fa-solid fa-arrow-left"></i> Back to Delivery</button>
   </form>
   <?php
   $totalPrice = (int)$totalPrice;
   ?>
</div>

<div class="row">
   <div class="card col">
      <h1 class="m-1">Order overview</h1>
      <h5 class="m-2">Your email is {{$email}}</h5>
      <div class="card mt-2 mb-3">
        <div class="card-body">
           <?php
              $selectedTime = json_decode($selectedTime, true); // Convert string to associative array
           ?>
           <table>
            <tr>
               <th width="70%">Address</th>
               <th>Delivery moment</th>
            </tr>
          
           <p class="card-text">
           <tr>
               <td>Address: {{ $address }}</td>
               <td>Date: {{ $selectedTime['date'] }}</td>  
           </tr>
           <tr>
            <td>Postal code: {{ $postalCode }}</td>
            <td> From: {{ date('h:i A', strtotime($selectedTime['from'])) }}</td>
           </tr>
           <tr>
            <td> City: {{ $city }}</td>
            <td>To: {{ date('h:i A', strtotime($selectedTime['to'])) }}</td>
           </tr>
           </p>
           </table>
        </div>
     </div>
     <tr>
                        <td align="left" style="padding-top: 20px;">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td width="10%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                        Quantity
                                    </td>
                                    <td width="80%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                        Name
                                    </td>
                                    <td width="10%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                        Subtotal
                                    </td>
                                </tr>
                                @foreach (session()->get('shoppingCart') as $cartItem)
                                <tr>  
                                <td width="10%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                    <P class="mt-3">{{ $cartItem['quantity'] }}x</P>
                                </td>
                                    <td width="80%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        {{$cartItem['product']['name']}}
                                    </td>
                                    <td width="10%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        <p>  ${{$subTotal = $cartItem['subtotal'] * $cartItem['quantity'] }} </p>
                                         
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
   </div>

   <div class="card col">
   <h1 class="m-1 mb-4">Select payment option</h1>
      <!-- Replace "test" with your own sandbox Business account app client ID -->
      <script src="https://www.paypal.com/sdk/js?client-id=AZRv1DzPupaYLd5JiThs0A-_P7squ8z3sXshzjPtWxfd6UDA5E3tFU3775L_A27sCa4u8PLHwaW--q0a"></script>
      <!-- Set up a container element for the button -->
      <div class="mt-3">
      <div id="paypal-button-container"></div>
      <script>
         var url = '{{ url("order/redirect/$email") }}';
         url = url.replace(':email', email);
         var price = "{{$totalPrice}}";
         var email = "{{$email}}";
         const totalPrice = parseFloat(price).toFixed(2);
         paypal
            .Buttons({
               createOrder: function (data, actions) {
                  return actions.order.create({
                     purchase_units: [
                        {
                           amount: {
                              value: totalPrice,
                           },
                        },
                     ],
                  });
               },
               // Finalize the transaction after payer approval
               onApprove(data, actions) {
                  return actions.order.capture().then(function (details) {
                     window.location.href = url;
                  })
               },
            })
            .render('#paypal-button-container');
      </script>
   </div>
   </div>
</div>
</div>
@endsection
