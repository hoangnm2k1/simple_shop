<?php

namespace App\Http\dto;

class Cart {
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
        if($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
        }
    }

    public function addCart($product, $id, $quantity) {
        $newProduct = ['quantity' => 0, 'price' => 0, 'productInfo' => $product];
        if($this->products) {
            if(array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quantity']+= (int) $quantity;
        $newProduct['price'] = $newProduct['quantity'] * (float) $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += (float) $product->price * (float) $quantity;
        $this->totalQuantity+= (int) $quantity;

    }

    public function deleteItemCart($id) {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function updateItemCart($id, $quantity) {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quantity'] = $quantity;
        $this->products[$id]['price'] = $quantity * $this->products[$id]['productInfo']->price;

        $this->totalQuantity += $this->products[$id]['quantity'];
        $this->totalPrice += $this->products[$id]['price'];
    }
}
?>
