<?php
namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function create($data){
        Product::create($data);
      }

}
