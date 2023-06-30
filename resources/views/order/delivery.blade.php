@extends('layouts.app')

@section('content')

<?php
session_start();

$totalPrice = $_POST['totalprice'];
$email = $_POST['email'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$postalCode = $_POST['postalCode'];
$city = $_POST['city'];
$currentDate = date('d-m-Y');
$endDate = date('d-m-Y', strtotime($currentDate . ' + 6 days'));
?>

<div class="container">
   <div class="d-flex align-items-end">
      <form action="{{ url('order/information') }}" method="POST" id="form">
         @csrf
         <input type="hidden" name="totalprice" value="{{$totalPrice}}">
      <input type="hidden" name="email" value="{{$email}}">
      <input type="hidden" name="address" value="{{$address}}">
      <input type="hidden" name="address2" value="{{$address2}}">
      <input type="hidden" name="postalCode" value="{{$postalCode}}">
      <input type="hidden" name="city" value="{{$city}}">
         <button type="submit" class="btn btn-success m-3"><i class="fa-solid fa-arrow-left"></i> Back to information</button>
      </form>
   </div>
   <h1>Select moment for delivery</h1>
   <br>
   <div class="row">
      <div class="col">
         <form action="{{ url('order/overview') }}" method="POST" id="form">
            @csrf
            <input type="hidden" id="selected-timeframes" name="selectedTimeframes">
            <input type="hidden" name="totalprice" value="{{$totalPrice}}">
            <input type="hidden" name="email" value="{{$email}}">
            <input type="hidden" name="address" value="{{$address}}">
            <input type="hidden" name="address2" value="{{$address2}}">
            <input type="hidden" name="postalCode" value="{{$postalCode}}">
            <input type="hidden" name="city" value="{{$city}}">
            <div class="dropdown">
               <select class="form-select" id="timeframe-dropdown" name="timeframe" onchange="handleCardChange(this)">
               </select>
            </div>
            <button type="submit" onclick="handleSubmit()" class="btn btn-success mt-3">Continue to overview</button>
         </form>
      </div>
   </div>
</div>

<script>
   var myHeaders = new Headers();
   myHeaders.append("apikey", "gDLoKcK3LGDtc0vbLkzm6mKwbc5ZYtLc");
   myHeaders.append("Cookie", "ak_bmsc=63520339FC5DE4580A00D097A189A55A~000000000000000000000000000000~YAAQJzdlX2V/v2yIAQAAWPQ8exN8kxY9JfdC6AsQYWzUS28Cb1st0C7zHAox5txUz3H85kue0/v8QZUo22pJHTkyqUuwmCzL8iKM6tsL/X8O7lSyIjclFWp3d6zAE2U/XxILYKdRytYJSYN2+py4fRsK/n4skIo+973k2ahxF18UwkXtdvkwrZoFEzB4f0/7bEJARmb8FUUQFv5wByBeVvQzDpojkA5AdirYx0NPxCyOExV6uQ1I9NjwllM4gtarzHbKVuq4/FRrSy8QOOKNoQyQOKc2puJvoFjwZmvD0nZtlKln/QFHGOLCcPUewlAqB9aNMt1wJchxYJ3xwkBbweAr3gHzekFU6RPnCYWmXP/O654ax//Zx0+okg==; akacd_Gravitee=3863147570~rv=4~id=e8328bb2ed0091d092df1b796709b775");

   var requestOptions = {
      method: 'GET',
      headers: myHeaders,
      redirect: 'follow'
   };

   function handleCardChange(select) {
      var selectedOption = select.options[select.selectedIndex];
      var [date, from, to] = selectedOption.value.split('_');
      handleCardClick(date, from, to);
   }

   function handleCardClick(date, from, to) {
      var checkboxes = document.getElementsByClassName('timeframe-radio');

      for (var i = 0; i < checkboxes.length; i++) {
         checkboxes[i].checked = false;
      }

      var radioButton = document.getElementById(date + '_' + from + '_' + to);
      radioButton.checked = true;
   }

   function handleSubmit() {
      var selectedRadioButton = document.querySelector('.timeframe-radio:checked');

      if (selectedRadioButton) {
         var [date, from, to] = selectedRadioButton.value.split('_');
         var selectedTimeframe = { date: date, from: from, to: to };
         document.getElementById('selected-timeframes').value = JSON.stringify(selectedTimeframe);
         document.getElementById('form').submit();
      } else {
         alert('Please select a timeframe.');
      }
   }

   fetch(`https://api-sandbox.postnl.nl/shipment/v2_1/calculate/timeframes?AllowSundaySorting=true&Options=Daytime,Evening&StartDate=${encodeURIComponent('{{$currentDate}}')}&EndDate=${encodeURIComponent('{{$endDate}}')}&CountryCode=NL&PostalCode=2521CA&HouseNumber=3&HouseNrExt=a bis&Street=Waldorpstraat&City='S-Gravenhage`, requestOptions)
      .then(response => response.json())
      .then(data => {
         var timeframes = data?.Timeframes?.Timeframe;

         if (timeframes) {
            var dropdownMenu = document.getElementById('timeframe-dropdown');

            var currentDate = new Date();
            var currentTime = currentDate.getHours() * 100 + currentDate.getMinutes(); // Convert current time to a numeric representation

            for (var i = 0; i < timeframes.length; i++) {
               var timeframe = timeframes[i];
               var timeframeTimeFrames = Array.isArray(timeframe.Timeframes.TimeframeTimeFrame) ? timeframe.Timeframes.TimeframeTimeFrame : [timeframe.Timeframes.TimeframeTimeFrame];

               for (var j = 0; j < timeframeTimeFrames.length; j++) {
                  var timeframeTimeFrame = timeframeTimeFrames[j];
                  var radioButtonId = timeframe.Date + '_' + timeframeTimeFrame.From + '_' + timeframeTimeFrame.To;
                  var checked = '';
                  var disabled = '';

                  if (timeframe.Date === currentDate.toLocaleDateString()) {
                     checked = 'selected';
                  }

                  var fromTime = parseInt(timeframeTimeFrame.From.replace(':', '') + '00'); // Convert 'HH:MM' format to numeric representation
                  var toTime = parseInt(timeframeTimeFrame.To.replace(':', '') + '00');

                  if (currentDate.toLocaleDateString() === '{{$currentDate}}' && currentTime >= fromTime && currentTime <= toTime) {
                     disabled = 'disabled';
                  }

                  var optionText = `${timeframe.Date} ${timeframeTimeFrame.From}-${timeframeTimeFrame.To}`;
                  var optionValue = `${timeframe.Date}_${timeframeTimeFrame.From}_${timeframeTimeFrame.To}`;
                  var option = document.createElement('option');
                  option.value = optionValue;
                  option.textContent = optionText;
                  option.selected = checked;
                  option.disabled = disabled;
                  dropdownMenu.appendChild(option);
               }
            }
         }
      })
      .catch(error => console.log('error', error));
</script>

@endsection
