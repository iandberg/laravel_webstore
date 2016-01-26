<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id','user_id','total','created_at', 'updated_at'];
    
    
}
