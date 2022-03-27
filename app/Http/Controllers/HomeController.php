<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Services\OrderService;
use App\Http\Services\ProductService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /** @var UserService */
    protected $userService;

    /** @var OrderService */
    protected $orderService;

    /** @var ProductService */
    protected $productService;

    public function __construct(UserService $userService, OrderService $orderService, ProductService $productService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
        $this->orderService = $orderService;
        $this->productService = $productService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home')->with([
            "orders" => $this->orderService->get()->count(),
            "users" => $this->userService->get()->count(),
            "products" => $this->productService->get()->count()
        ]);
    }
}
