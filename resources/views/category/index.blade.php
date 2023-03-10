@extends('layouts.app')
@section('content')
    
<div class="container">
    <div class="row">
        @foreach($categories as $category)
            <div class="col-sm-2 mx-auto" >
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">{{$category->name}}</h5>
                <a href="{{ url('/category/showproductsbycategory/' . $category->id) }}" class="btn btn-info btn-sm">see all {{$category->name}} products</a>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
