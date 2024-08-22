<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'carts';
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function cartDetails()
    {
        return $this->hasMany('App\Models\Cart_detail', 'cart_id', 'id');
    }

}
