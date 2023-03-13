@extends('layouts.app')

@section('content')

@if(Auth::check() && Auth::user()->admin == true)
               Welkom admin
@else

welkom

@endif
@endsection
