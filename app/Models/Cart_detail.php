<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_detail extends Model
{
    use HasFactory;

    protected $table = 'cart_detail';
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function cart()
    {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }

}
