<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** @var CartController  */
    protected $cartController;

    public function __construct(CartController $cartController)
    {
        $this->cartController = $cartController;
    }

    public function home()
    {
        $categories = ProductCategories::get();
        return view('home')->with(["categories" => $categories]);
    }

    public function categoryProducts($catId)
    {
        $products = Product::leftJoin('carts', function($join){
            $join->on('products.id', '=', 'carts.product_id');
            $join->whereNull('carts.deleted_at');
        })->where('products.product_category_id', $catId)->select('products.*', 'carts.quantity')->orderBy('products.id','asc')->get();
        return view('categoryproducts')->with(["products" => $products]);
    }

    public function addToCart($catId, $productId)
    {
        $this->cartController->addToCart($productId, true);
        return redirect('/product-category/' . $catId);
    }
}
