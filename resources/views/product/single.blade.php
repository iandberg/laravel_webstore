@extends('layout.main')

@section('title', $product->title)

@section('content')

<div id="single_product" class="row">
	<div class="col-sm-6">
		<div class="product_image">
			<img src="{{ url($product->image_url) }}" alt="{{ $product->title }}">
		</div>
	</div>
	<div class="col-sm-6">
		<h1>{{ $product->title }}</h1>
		
		<div class="product_desc well">
			<p>{{ $product->description }}</p>
		</div>
		
		<div class="cart_buttons">
			<form method="post" action="/cartitem/{{ $product->id }}/new">
				{!! csrf_field() !!}
				<label for="qty">Quantity</label>
				<input id="qty_field" type="text" name="qty" value="1">
				<input type="submit" value="Add to cart">
			</form>

		</div>
	</div>
</div>
	
@endsection