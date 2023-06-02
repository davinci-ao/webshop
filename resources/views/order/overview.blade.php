@extends('layouts.app')

@section('content')

<?php
$totalPrice = $_POST['totalprice'];
$selectedTime = $_POST['selectedTimeframes'];
?>

<div class="d-flex align-items-end">
   <form action="{{ url('order/delivery') }}" method="POST" id="form">
      @csrf
      <input type="hidden" name="totalprice" value="{{$totalPrice}}">
      <button type="submit" class="btn btn-success mx-4 mb-4">Back to Delivery</button>
   </form>
   <?php
   $totalPrice = (int)$totalPrice;
   ?>
</div>

<div class="row">
   <div class="card col">
      <p>Your total is ${{$totalPrice}}</p>
      <p>Your email is {{$email}}</p>
      <div class="card">
        <div class="card-body">
           <h5 class="card-title">Delivery Time</h5>
           <?php
              $selectedTime = json_decode($selectedTime, true); // Convert string to associative array
           ?>
           <p class="card-text">
              Date: {{ $selectedTime['date'] }}<br>
              From: {{ date('h:i A', strtotime($selectedTime['from'])) }}<br>
              To: {{ date('h:i A', strtotime($selectedTime['to'])) }}
           </p>
        </div>
     </div>
   </div>

   <div class="card col">
      <!-- Replace "test" with your own sandbox Business account app client ID -->
      <script src="https://www.paypal.com/sdk/js?client-id=AZRv1DzPupaYLd5JiThs0A-_P7squ8z3sXshzjPtWxfd6UDA5E3tFU3775L_A27sCa4u8PLHwaW--q0a"></script>
      <!-- Set up a container element for the button -->
      <div id="paypal-button-container"></div>
      <script>
         var url = '{{ url("send-mail") }}';
         url = url.replace(':email', email);
         var price = <?php echo $totalPrice ?>;
         var email = "<?php echo $email ?>";
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
                     alert('Transaction completed by ' + details.payer.name.given_name + email);
                     window.location.href = url;
                  })
               },
            })
            .render('#paypal-button-container');
      </script>
   </div>
</div>

@endsection
