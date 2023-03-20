@extends('layouts.app')
@section('content')
    <div class="container">
        <a href={{"delete/"}} class="btn btn-danger btn-sm"> empty whole cart </a>
        <div class="row">
            @if(Session::has('product'))
                @foreach(Session::get('product') as $item)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                <img class="card-img" src="{{url('/images' . '/' . $item['file_path'])}}"/>
                                <a href="#!">
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-3 text-reset">{{$item['name']}}</h5>
                                <div class="text-reset">
                                    {{-- @if ($product->category)
                                    <p>{{$product->category->name}}</p>
                                    @endif --}}
                                </div>
                                <h6 class="mb-3">${{$item['price']}}</h6>
                                <a href={{"delete/" . $item['id']}} class="btn btn-danger btn-sm"> Delete  {{$item['name']}} out cart? </a>
                                <br>
                            </div>
                        </div>
                    </div>  
                @endforeach
            @endif
        </div>
    </div>
@endsection
