<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cart;

class CartsController extends Controller
{

	public function index()
	{
		$message = null;
		$cartitems = null;
		
		if(!Session::get('cart_id')){
			$message = "You have nothing in your cart";
			
			return view('cart.index', compact('message', 'cartitems'));
			
		}else{
			$cart_id = Session::get('cart_id');
			$cart = Cart::whereId($cart_id)->firstOrFail();
			$cartitems = $cart->cartitems()->get();
			
			// total up the cart
			$grandtotal = 0;
			foreach($cartitems as $item){
				$grandtotal += $item->price_total;
			}
			$cart->total = $grandtotal;
			$cart->save();
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
			
			return view('cart.index', compact('message', 'cartitems', 'cart'));
		}

	}

	public static function new($user_id = null)
	{
		$cart = new Cart([
			'user_id'	=> $user_id
		]);
		
		$cart->save();
		
		return $cart;
	}

}
