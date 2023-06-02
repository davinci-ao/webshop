@extends('layouts.app')

@section('content')
<div class="row">                      
      <div class="col card">
      <form method="POST" action="{{ route('login') }}">
                        @csrf
  <div class="form-row">
    <div class="form-group col-md-6 m-4">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" value="" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="form-group col-md-6 m-4">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Adress">
  </div>
  <div class="form-group col-md-6 m-4">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Adress">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 m-4">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" placeholder="City">
    </div>
    <div class="form-group col-md-3 m-4">
      <label for="inputPostalCode">Postal code</label>
      <input type="text" class="form-control" id="inputPostalCode" placeholder="1234AB">
    </div>
  </div>
  <button type="submit" class="btn btn-primary mx-4 mb-4">Continue to delivery</button>
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
@endguest
@endsection