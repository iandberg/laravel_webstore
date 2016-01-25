@extends('layout.main')

@section('title','Products Go Here')

@section('content')

	@if ($products)
        <div class="row">
			@foreach($products as $product)
				<div class="product_cell col-sm-3">
					<a href="{{ url('/products/' . $product->id) }}">
						<div class="product_image">
							<img src="{{ url($product->image_url) }}" alt="{{ $product->title }}">
						</div>
						<div class="product_title">
							{{ $product->title }}
						</div>
						<div class="product_price">
							{{ money_format('$%i',$product->price) }}
						</div>
					</a>
				</div>
			@endforeach
        </div>
	@endif

@endsection