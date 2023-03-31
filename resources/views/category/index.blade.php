@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if(Auth::check() && Auth::user()->admin == "1")
                <a href="#" class="btn btn-success btn-sm mx-4 my-4">+ Add category</a>
            @endif  
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                            <img class="img" src="{{url('/images' . '/' . $category->file_path)}}"/>
                            <a href="#!">
                                <div class="hover-overlay">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-reset">{{$category->name}}</h5>
                            <div class="text-reset">
                                <a href="{{ url('/category/showproductsbycategory/' . $category->id) }}" class="btn btn-dark btn-sm">see all {{$category->name}} products</a>
                                @if(Auth::check() && Auth::user()->admin == "1")
                                <br>
                                <hr>
                                <br>
                                <a href="{{ url('/category/showproductsbycategory/' . $category->id) }}" class="btn btn-success btn-sm">Edit {{$category->name}}</a>
                                <br>
                                <hr>
                                <br>
                                <a href="{{ url('/category/showproductsbycategory/' . $category->id) }}" class="btn btn-danger btn-sm">Delete {{$category->name}}</a>
                                @endif
                            </div>  
                        </div>         
                    </div>           
                </div>           
            @endforeach
        </div>
    </div>
@endsection
