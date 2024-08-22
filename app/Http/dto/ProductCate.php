<?php
namespace App\Http\dto;
class ProductCate
{
    public $id;
    public $name;
    public $price;
    public $category_id;
    public $category_name;
    public $created_at;
    public $updated_at;
    public $img_url;

    public function __construct($id,  $name,  $price,  $category_id,  $category_name,  $created_at,  $updated_at,  $img_url)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->img_url = $img_url;
    }

}
