<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CartItem;

class CartItemsController extends Controller
{
	
	public function new($product_id, Request $request)
	{
		// if !session cart id, then create new cart, store id in session
		$product = Product::whereId($product_id)->firstOrFail(); //to get product price from db
		
		$cartitem = new CartItem([
			'product_id' 	=> $product->id,
			'qty'			=> $request->get('qty'),
			'price_ea'		=> $product->price,
			'price_total'	=> $product->price * $request->get('qty')
		]);
		
		$cartitem->save();
		
		return redirect('/')->with('status', $product->title . 'added to cart!');
	}

}
