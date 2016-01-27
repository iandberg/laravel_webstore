@extends('layout.main')

@section('title','Products Go Here')

@section('content')

	@if ($message)
		<div class="alert">
			{{ $message }}
		</div>
	@endif

	@if ($cartitems)
        <div class="row">
			<div class="cartitems col-xs-10 col-xs-offset-1">
				<div class="row cart_header">
					<div class="col-xs-4"><h4>Product</h4></div>
					<div class="col-xs-2"><h4>Qty</h4></div>
					<div class="col-xs-2"><h4 class="text-right">Price Ea.</h4></div>
					<div class="col-xs-2"><h4 class="text-right">Total</h4></div>
					<div class="col-xs-2"><h4 class="text-right">Edit</h4></div>
				</div>
				
		@foreach($cartitems as $cartitem)
				
				<div class="row cartitem">
					<div class="col-xs-2">
						<p class="cart_text">{{ $cartitem->product()->get()[0]->title }}</p>
					</div>
					<div class="col-xs-2 cart_image">
						<img src="{{ $cartitem->product()->get()[0]->image_url }}" alt="{{ $cartitem->product()->get()[0]->title }}">
					</div>
					<div class="col-xs-2">
						<p class="cart_text">{{ $cartitem->qty }}</p>
					</div>
					<div class="col-xs-2">
						<p class="cart_text text-right">{{ money_format('$%i',$cartitem->price_ea) }}</p>
					</div>
					<div class="col-xs-2">
						<p class="cart_text text-right">{{ money_format('$%i',$cartitem->price_total) }}</p>
					</div>
					<div class="col-xs-2">
						<div class="delete_button" onclick="deleteCartItem({{ $cart->id . ',' . $cartitem->id }})">Delete</div>
					</div>
				</div>
				
		@endforeach
        
				<div class="row">
					<div class="col-xs-offset-8 col-xs-4 text-right">
						Total: {{ money_format('$%i',$cart->total) }}
					</div>
				</div>        
				
			</div><!-- 	end cartitems -->
        </div>
	@endif
	<!-- end if-cartitems -->

@endsection


<script type="text/javascript">
	function deleteCartItem(cartid, cartItemId) {

		var xhr = new XMLHttpRequest();
		xhr.responseType = 'json';
		xhr.open('POST','/cartitem/delete');
		
		xhr.onload = function () {
			if(this.status === 200){
				console.log(this.response);
			}
		}
		
		xhr.send(JSON.stringify({
			cartid : cartid,
			cartItemId : cartItemId,
			_token : '{{ csrf_token() }}'
		}));
	}
</script>











