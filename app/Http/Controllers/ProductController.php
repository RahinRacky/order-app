<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductService;

class ProductController extends Controller
{
    /** @var ProductService */
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('products')->with([
            'products' => $this->productService->get()
        ]);
    }
}
