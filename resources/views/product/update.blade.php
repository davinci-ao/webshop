@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Update product</div>
  <div class="card-body">
      
      <form action="{{ url('product/storeProduct/' .$product->id) }}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
        <label>Product name</label></br>
        <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control"></br>

        <label>Product description</label></br>
        <input type="text" name="description" id="description" value="{{$product->description}}" class="form-control"></br>

        <label>Product price</label></br>
        <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control"></br>

        <label>Product file_path</label></br>
        <input type="text" name="file_path" id="file_path" value="{{$product->file_path}}" class="form-control"></br>

        <input type="hidden" name="category_id" id="category_id" value="{{$product->category_id}}"/>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop