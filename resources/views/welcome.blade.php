@extends('layouts.app')
    @section('content')
    <div class="container">
        @if(Auth::check() && Auth::user()->admin == true)
        <h1 class= mx-4>Welkom admin</h1>
        
        <a href="{{ url('/product') }}" class="btn btn-dark btn-xl mx-4 my-4">Edit products</a>
        <br>
        <a href="{{ url('/category') }}" class="btn btn-dark btn-xl mx-4 my-4">Edit categories</a>
        <br>
        <a href="{{ url('/admin/' . 'edituser/') }}" class="btn btn-dark btn-xl mx-4 my-4">Edit users</a>
        <br>      
@else

welkom

@endif
@endsection
