@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row">
                    @foreach($users as $user)
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title mb-3 text-reset">{{$user->username}}</h2>
                                        <div class="text-reset">
                                            </div>
                                            <a href="{{ url('/user/' . 'details/' . $user->id) }}" class="btn btn-dark btn-sm">See {{$user->username}}</a>
                                            <br>
                                            <hr>
                                            <br>
                                            <a href="{{ url('/user/' . 'details/' . $user->id) }}" class="btn btn-success btn-sm">Edit {{$user->username}}</a>
                                            <br>
                                            <hr>
                                            <br>
                                            <a href="{{ url('/user/' . 'details/' . $user->id) }}" class="btn btn-danger btn-sm">Delete {{$user->username}}</a>
                                        </div>
                                    </div>
                                </div>      
                    @endforeach
                </div>
            </div> 
@endsection