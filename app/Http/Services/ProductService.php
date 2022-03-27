<?php
namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;

class ProductService
{
    /** @var ProductRepository */
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function get()
    {
        return $this->productRepository->get();
    }

}
