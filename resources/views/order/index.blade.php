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
      </div>
      <style>
        .card {
          border: 1px solid #ccc;
          border-radius: 5px;
          padding: 10px;
          margin-bottom: 10px;
          background-color: #f9f9f9;
        }
      </style>
      <div class="col card">
        <script>
          var myHeaders = new Headers();
          myHeaders.append("apikey", "gDLoKcK3LGDtc0vbLkzm6mKwbc5ZYtLc");
          myHeaders.append("Cookie", "ak_bmsc=63520339FC5DE4580A00D097A189A55A~000000000000000000000000000000~YAAQJzdlX2V/v2yIAQAAWPQ8exN8kxY9JfdC6AsQYWzUS28Cb1st0C7zHAox5txUz3H85kue0/v8QZUo22pJHTkyqUuwmCzL8iKM6tsL/X8O7lSyIjclFWp3d6zAE2U/XxILYKdRytYJSYN2+py4fRsK/n4skIo+973k2ahxF18UwkXtdvkwrZoFEzB4f0/7bEJARmb8FUUQFv5wByBeVvQzDpojkA5AdirYx0NPxCyOExV6uQ1I9NjwllM4gtarzHbKVuq4/FRrSy8QOOKNoQyQOKc2puJvoFjwZmvD0nZtlKln/QFHGOLCcPUewlAqB9aNMt1wJchxYJ3xwkBbweAr3gHzekFU6RPnCYWmXP/O654ax//Zx0+okg==; akacd_Gravitee=3863147570~rv=4~id=e8328bb2ed0091d092df1b796709b775");
      
          var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
          };
      
          function handleCardClick(date) {
      console.log('Clicked date:', date);
      // You can perform further actions here based on the clicked date
    }

    function handleCardClick(date, from, to) {
      console.log('Clicked date:', date);
      console.log('From:', from);
      console.log('To:', to);
      // You can perform further actions here based on the clicked date and time
    }

    fetch("https://api-sandbox.postnl.nl/shipment/v2_1/calculate/timeframes?AllowSundaySorting=true&Options=Daytime,Evening&StartDate=03-06-2023&EndDate=09-06-2023&CountryCode=NL&PostalCode=2521CA&HouseNumber=3&HouseNrExt=a bis&Street=Waldorpstraat&City='S-Gravenhage", requestOptions)
      .then(response => response.json())
      .then(data => {
        var timeframes = data?.Timeframes?.Timeframe;

        if (timeframes) {
          var output = '';
          for (var i = 0; i < timeframes.length; i++) {
            var timeframe = timeframes[i];
            var timeframeTimeFrames = Array.isArray(timeframe.Timeframes.TimeframeTimeFrame)
              ? timeframe.Timeframes.TimeframeTimeFrame
              : [timeframe.Timeframes.TimeframeTimeFrame];

            for (var j = 0; j < timeframeTimeFrames.length; j++) {
              var timeframeTimeFrame = timeframeTimeFrames[j];
              output += '<a href="javascript:void(0)" onclick="handleCardClick(\'' + timeframe.Date + '\', \'' + timeframeTimeFrame.From + '\', \'' + timeframeTimeFrame.To + '\')">';
              output += '<div class="card">';
              output += '<strong>Date:</strong> ' + timeframe.Date + '<br>';
              output += '<strong>From:</strong> ' + timeframeTimeFrame.From + '<br>';
              output += '<strong>To:</strong> ' + timeframeTimeFrame.To + '<br>';
              output += '</div>';
              output += '</a>';
            }
          }

          document.getElementById("se").innerHTML = output;
        } else {
          document.getElementById("se").innerHTML = 'No timeframes available.';
        }
      })
      .catch(error => console.log('error', error));
  </script>
  <div id="se"></div>
</div>
      
  </div>
</div>
@endsection