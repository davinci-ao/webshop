@extends('layouts.app')

@section('content')

<?php
$totalPrice = $_POST['totalprice'] ?? null;
$email = $_POST['email'] ?? null;
$address = $_POST['address'] ?? null;
$address2 = $_POST['address2'] ?? null;
$postalCode = $_POST['postalCode'] ?? null;
$city = $_POST['city'] ?? null;


?>
<div class="container">
<a type='button' href="{{ url('/cart/index') }}" class='btn btn-success btn-block m-3'><i class="fa-solid fa-arrow-left"></i> Back to cart</a>
<div class="row">                      
      <div class="col card">
      <form method="POST" action="{{ url('order/delivery/') }}">
                        @csrf
  <div class="form-row">
    <div class="form-group col-md-6 m-4">
      <label for="email">Email</label>
      @auth
      <input type="email" name="email" class="form-control" value="{{$email}}" id="email" placeholder="Email">
      @endauth

      @guest
      
      <input type="email" name="email" class="form-control" 
    value="<?php echo isset($email) ? $email : ''; ?>"
    id="email" placeholder="Email">
      @endguest

    </div>
  </div>
  <div class="form-group col-md-6 m-4">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" placeholder="Adress" value="{{$address}}">
  </div>
  <div class="form-group col-md-6 m-4">
    <label for="address2">Address 2</label>
    <input type="text" class="form-control" name="address2" placeholder="Adress" value={{($address2)}}>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3 m-4">
      <label for="postalCode">Postal code</label>
      <input type="text" class="form-control" name="postalCode" placeholder="1234AB" value="{{$postalCode}}" required>
    </div>
    <div class="form-group col-md-6 m-4">
      <label for="city">City</label>
      <input type="text" class="form-control" name="city" placeholder="City"  value="{{$city}}" required>
    </div>
  </div>
  <input type="hidden" name="totalprice" value="{{$totalPrice}}">
  <button type="submit" class="btn btn-success mx-4 mb-4">Continue to delivery</button>
</form>
      </div>      

   @guest
<div class="col card">
    <h3 class="m-4">Already got an account?</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="m-4">
                            <label for="email">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        

                        <div class="m-4">
                            <label for="password">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                      

                        
                            <div class="col-md-6 m-4">
                                <div class="form-check my-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                      

                       
                            <div class="col-md-8 m-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Register?') }}
                                    </a>
                                @endif
                            </div>
                        
                    </form>
                </div>
</div>
</div>
</div> 
@endguest
@endsection