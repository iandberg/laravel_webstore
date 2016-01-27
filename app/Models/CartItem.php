<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
	protected $guarded = ['id'];

	public function product()
	{
		return $this->hasOne('App\Models\Product','id','product_id'); //(model, foreign_key, local_key)
	}
	
}
