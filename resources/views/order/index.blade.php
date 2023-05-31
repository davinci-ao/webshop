@extends('layouts.app')
@section('content')

<?php 
  $totalprice = $_POST['totalprice'];
  $totalprice = (int)$totalprice; 
?>
<div class="container">
    <div class="d-flex align-items-end">
        <a type='button' href="{{ url('/cart/index') }}" class='btn btn-success btn-block' ><i class="fa-solid fa-arrow-left"></i> back to cart</a>
    </div>
    <br>
    <div class="row">                      
      <div class="col card">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=AZRv1DzPupaYLd5JiThs0A-_P7squ8z3sXshzjPtWxfd6UDA5E3tFU3775L_A27sCa4u8PLHwaW--q0a"></script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
          var price = {{$totalprice}};
          const totalprice = parseFloat(price).toFixed(2);
            paypal
            .Buttons({
              createOrder:function(data, actions, ) {
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
                  alert('Transaction completed by ' + details.payer.name.given_name);
                })
              },
            })
            .render('#paypal-button-container');
      </script>
    </div>
    <div class="col card">
      <script>
        var myHeaders = new Headers();
        myHeaders.append("apikey", "	gDLoKcK3LGDtc0vbLkzm6mKwbc5ZYtLc");
        myHeaders.append("Cookie", "ak_bmsc=7CBAA82622EC0CA6E150095F8502F6BB~000000000000000000000000000000~YAAQbBjdWCTfLEKIAQAAEk3/UxNdaCGoC7pEKmID3eQvhSXJCi5G6hhZiXS3M7sg/I1XQb54pqei8JJPYZTQBhcXLsGX5QRr97EjCGLkKM7Z1Jda2d5gUJTZ86fZRGYvNy6pgCKaDZp3LJgdPv7CaqmZ8qXxfMeHOjbWmD66hAzoZdSc9HUlYtwzDm5suwp7cRTUNa+76i78Aq7KMUw6DWDJAE1Pp5B/+daJYUuyTHW5cVYFqaz/J3V9lDkF4faYnPBYpolu4sHECDiEG2EtB8rCyTDSG8uBYiXDm8DvBV0y/1Wt3OQtA4TKNSWZWG15JCa6wPR+JeKU5q8a9gsVEsXC3wEiQavjYg6KsNrsPbFmgWkeWohjFSqonw==; bm_sv=25C534EBFCDF1547A20F11A360E0656A~YAAQbBjdWHftLkKIAQAAg/sZVBNdZFog+t5XxpvGiX6QImksFIiWrdc3W2uJLz1mFkB52ZVeLEB+f1EzUEKPJhEq0c6U2zfAeBKNQaPtaMAuAC6Zwa6CswIySN7rdZoCzWN2wLyNa5LV5uXmYnIUYi5Z+ev9QQvtdW+/EdlKjrBvjBxh+rggrx914NEhHN5ca4SoapDrF2iGEHS7WbtfUEkKNgVRPnFbIwezWEYg0Zls/C94tv3vozCv61Dentg=~1; akacd_Gravitee=3862490214~rv=78~id=decd56d158c1c3e37f25d95e9c399e71");

        var requestOptions = {
          method: 'GET',
          headers: myHeaders,
          redirect: 'follow'
        };

        fetch("https://api-sandbox.postnl.nl/shipment/v2_1/calculate/timeframes?AllowSundaySorting=true&Options=Daytime,Evening&StartDate=26-05-2023&EndDate=01-06-2023&CountryCode=NL&PostalCode=2521CA&HouseNumber=3&HouseNrExt=a bis&Street=Waldorpstraat&City='S-Gravenhage", requestOptions)
          .then(response => response.text())
          .then(result => document.getElementById("se").innerHTML = result)
          .catch(error => console.log('error', error));

        </script>
        <p id="se"></p>
    </div>
  </div>
</div>
@endsection