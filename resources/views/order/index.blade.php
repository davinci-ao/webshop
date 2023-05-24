@extends('layouts.app')
@section('content')

<?php $totalprice = $_POST['totalprice'];
$int = (int)$totalprice; 
?>



    <div class="container">
        <div class="d-flex align-items-end">
            <a type='button' href="{{ url('/cart/index') }}" class='btn btn-success btn-block' ><i class="fa-solid fa-arrow-left"></i> back to cart</a>
        </div>
        <br>
        <div class="row">
         

                               
                                    
            <div class="col card">
                 <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=Ab0btLydcs2Fzqbyht7vpeFTEs8eRCKZFu_bjW2e2nfsC43Uhi78yQ8rYOAC8Lkca_QQbivglCATb7YA&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      var price = {{$int}};
      
      const totalprice = parseFloat(price).toFixed(2)
      paypal
        .Buttons({
          // Sets up the transaction when a payment button is clicked
          createOrder:function(data, actions, ) {
            return actions.order.create({
                purchase_units: [{
                    "amount":
                    {"currency_code":"USD",
                    "value": totalprice}
                }
            ]});},
          // Finalize the transaction after payer approval
          onApprove: function (data) {
            return fetch("/my-server/capture-paypal-order", {
              method: "post",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                orderID: data.orderID,
              }),
            })
              .then((response) => response.json())
              .then((orderData) => {
                // Successful capture! For dev/demo purposes:
                console.log(
                  "Capture result",
                  orderData,
                  JSON.stringify(orderData, null, 2)
                );
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(
                  "Transaction " +
                    transaction.status +
                    ": " +
                    transaction.id +
                    "\n\nSee console for all available details"
                );
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // var element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
              });
          },
        })
        .render("#paypal-button-container");
    </script>
            </div>
        </div>
    </div>
@endsection