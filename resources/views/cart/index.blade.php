@extends('layouts.app')
@section('content')
	<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
				 				<div class="product">
                                    <?php $totalPrice = 0;?>
				 					<div class="row">
                                        @if(Session::has('product'))
                                        @foreach(Session::get('product') as $item)
                                            <div class="col-md-3">
                                                <img class="img-fluid mx-auto d-block image" src="{{url('/images' . '/' . $item['file_path'])}}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-5 product-name">
                                                            <div class="product-name">
                                                                <a href="#">{{$item['name']}}</a>
                                                                <div class="product-info">
                                                                    @if ($item->category)
                                                                        <div>category: <span class="value">{{$item->category->name}}</span></div>
                                                                        <a href={{"delete/" . $item['id']}} class="fa fa-trash"></a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 quantity">
                                                            <label for="quantity">Quantity:</label>
                                                            <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                                        </div>
                                                        <div class="col-md-3 price">
                                                            <span>${{$item['price']}}</span>
                                                            <p class="hidetime" style="display: none">{{$totalPrice += (int)($item['price'])}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif
					 				</div>
				 				</div>
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
                                <div class="card">
                                    <h3>Summary</h3>
                                    <div class="summary-item"><span class="text">Total price: </span><span class="price">${{$totalPrice}}</span></div>
                                    <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
                                    <a href={{"delete/"}} class="btn btn-danger btn-sm">Empty whole cart </a>
                                </div>
				 			</div>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
</body>

@endsection

