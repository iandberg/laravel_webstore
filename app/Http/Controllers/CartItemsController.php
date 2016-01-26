<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartsController;

use App\Models\Product;
use App\Models\CartItem;

class CartItemsController extends Controller
{
	
	public function new($product_id, Request $request)
	{
		//outsource to new func?
		if(!Session::get('cart_id')){
			$cart = CartsController::new(); 
			$cart_id = $cart->id;
			Session::put('cart_id', $cart_id);
		}else{
			$cart_id = Session::get('cart_id');
		}
		
		$product = Product::whereId($product_id)->firstOrFail(); //to get product price from db
		
		$cartitem = new CartItem([
			'cart_id'		=> $cart_id,
			'product_id' 	=> $product->id,
			'qty'			=> $request->get('qty'),
			'price_ea'		=> $product->price,
			'price_total'	=> $product->price * $request->get('qty')
		]);
		
		$cartitem->save();
		
		return redirect('/')->with('status', $product->title . 'added to cart!');
	}
	
	public function seesess()
	{
		return dd(Session::all());
	}


}
