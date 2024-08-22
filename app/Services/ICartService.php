<?php

namespace App\Services;

interface ICartService {
    public function findCartByToken($token);
    public function addToCart($id, $token);
    public function getCartByToken($token);
    public function updateCart($request);
}
