@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Add Product</div>
  <div class="card-body">
      
      <form action="{{ url('product') }}" method="post">
        {!! csrf_field() !!}
        <label>Name of product</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>

        <label>description of product</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>

        <label>price of product</label></br>
        <input type="text" name="price" id="price" class="form-control"></br>

        <label>file_path of product</label></br>
        <input type="text" name="file_path" id="file_path" class="form-control"></br>

        <label>category_id of product</label></br>
        <input type="text" name="category_id" id="category_id" class="form-control"></br>

        <label>stocks of product</label></br>
        <input type="text" name="stock" id="stock" class="form-control"></br>
        
        {{-- <div style="display:none">
            <input type="text" id="user_id" name="user_id" value="{{Auth::user()->id}}">
        </div> --}}
    
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@endsection