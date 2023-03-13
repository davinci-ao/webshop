@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                @if(Auth::check() && Auth::user()->admin == true)
                
                Welkom admin

                @else

                welkom
                
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
