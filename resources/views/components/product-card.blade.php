<div class="card">     
<a href="{{ url('/product/' . 'details/' . $product->id . '/' . $product->category_id) }}"> 
                        <img class="img" src="{{url('/images' . '/' . $product->file_path)}}"/>
                        <div class="card-body">
                        <h5 class="card-title mb-3 text-reset">{{$product->name}}</h5>
                            <h6 class="mb-3">Price: ${{$product->price}}</h6>
                            </a>  
                            @if ($product->stock < 1)
                                <h6 class="mb-3 text-danger">Out of stock</h6>
                            @elseif ($product->stock < 4)
                                <h6 class="mb-3 text-warning">Only a few left in stock</h6>
                            @else
                                <h6 class="mb-3 text-success">In stock</h6>
                            @endif
                            <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
                            @if(Auth::check() && Auth::user()->admin == "1")
                                <div class="button-box">
                            @endif  
                            @if(Auth::check() && Auth::user()->admin == "1")
                                <a href="{{ url('/product/edit/' . $product->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ url('/product/delete/' . $product->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                                <hr>                     
                                <form action="{{ url('product/storeStockOfProduct/' .$product->id) }}" method="post">
                                <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
                                <form action="{{ url('cart/index/' . $product->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    <label>Stock:</label></br>
                                    <div class="input-group">
                                        <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
                                        <input type="text" name="stock" id="stock" value="{{$product->stock}}" class="form-control"><br>
                                        <input type="submit" value="Update stock" class="btn btn-success btn-sm"><br>
                                    </div>
                                </form>
                            @endif  
                           
                            @if(Auth::check() && Auth::user()->admin == "0")
                                <form action="{{ url('cart/index/' . $product->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="input-group">
                                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                        <input type="number" class="form-control.form-horizontal w-25" name="quantity" value="1" min="1">
                                        <button type="submit" class="btn btn-sm btn-dark"><i class="fa-solid fa-cart-shopping"></i></button>
                                    </div>
                                </form>
                                @endif
                                @guest
                                <form action="{{ url('cart/index/' . $product->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="input-group">
                                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                        <input type="number" class="form-control.form-horizontal w-25" name="quantity" value="1" min="1">
                                        <button type="submit" class="btn btn-sm btn-dark"><i class="fa-solid fa-cart-shopping"></i></button>
                                    </div>
                                </form>
                                @endguest
                        </div>
</div>
 