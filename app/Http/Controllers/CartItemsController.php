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
		// get or create cart
		if(!Session::get('cart_id')){
			$cart = CartsController::new(); 
			$cart_id = $cart->id;
			Session::put('cart_id', $cart_id);
		}else{
			$cart_id = Session::get('cart_id');
		}
		
		//get product data for cart item
		$product = Product::whereId($product_id)->firstOrFail(); 
		
		$cartitem = new CartItem([
			'cart_id'		=> $cart_id,
			'product_id' 	=> $product->id,
			'qty'			=> $request->get('qty'),
			'price_ea'		=> $product->price,
			'price_total'	=> $product->price * $request->get('qty')
		]);
		
		$cartitem->save();
		
		$request->session()->flash('status','Item added to cart!');
		
		return redirect('/');
	}
	
	public function delete(Request $request)
	
// 	public function delete($cart_id, $cartitem_id, Request $request)
	{
// 		$cartitem = CartItem::where('id', $cartitem_id)->where('cart_id', $cart_id);
// 		$cartitem->delete();
		
		return $request;
	}
	
	
	public function seesess()
	{
		return dd(Session::all());
	}


}
