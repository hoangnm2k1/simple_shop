<?php

namespace App\Services\Impl;

use App\Models\Cart_detail;
use App\Services\ICartDetailService;

class CartDetailServiceImpl implements ICartDetailService {
    public function findCartDetailBy($productId, $cartId){
        return Cart_detail::where(
            [
                ['product_id', $productId],
                ['cart_id', $cartId]
            ])->first();
    }

}
