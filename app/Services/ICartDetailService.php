<?php

namespace App\Services;

interface ICartDetailService {
    public function findCartDetailBy($productId, $cartId);
}
