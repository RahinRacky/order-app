<?php
namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository
{

    /** @var Product */
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function get()
    {
        return $this->product->get();
    }
}
