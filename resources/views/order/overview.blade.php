@extends('layouts.app')

@section('content')

<?php 
  $totalprice = $_POST['totalprice'];
  $totalprice = (int)$totalprice; 
?>

 <!-- Replace "test" with your own sandbox Business account app client ID -->
 <script src="https://www.paypal.com/sdk/js?client-id=AZRv1DzPupaYLd5JiThs0A-_P7squ8z3sXshzjPtWxfd6UDA5E3tFU3775L_A27sCa4u8PLHwaW--q0a"></script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
          var url = '{{ url("send-mail") }}';
          url = url.replace(':email', email);
          var price = <?php echo $totalprice ?>;
          var email = "<?php echo $email ?>";
          const totalprice = parseFloat(price).toFixed(2);
            paypal
            .Buttons({
              createOrder:function(data, actions) {
                return actions.order.create({
                  purchase_units: [
                    {
                      amount: {
                        value: totalprice,
                      },
                    },
                  ],
                });
              },
              // Finalize the transaction after payer approval
              onApprove(data, actions) {
                return actions.order.capture().then(function (details) {
                  alert('Transaction completed by ' + details.payer.name.given_name + email);
                  window.location.href=url;
                })
              },
            })
            .render('#paypal-button-container');
        </script>

@endsection