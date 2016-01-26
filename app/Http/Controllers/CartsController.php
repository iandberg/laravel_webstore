<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cart;

class CartsController extends Controller
{
	public static function new($user_id = null)
	{
		$cart = new Cart([
			'user_id'	=> $user_id
		]);
		
		$cart->save();
		
		return $cart;
	}

}
