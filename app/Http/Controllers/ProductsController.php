<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
	public function index()
	{
		$products = Product::all();
		
		return view('product.index', compact('products'));
	}

	public function single($id)
	{
		$product = Product::whereId($id)->firstOrFail();
		
		return view('product.single', compact('product'));
	}

}
