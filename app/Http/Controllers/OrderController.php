<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\OrderService;
use App\Http\Services\UserService;

class OrderController extends Controller
{
    /** @var OrderService */
    protected $orderService;

    /** @var UserService */
    protected $userService;

    public function __construct(OrderService $orderService, UserService $userService)
    {
        $this->orderService = $orderService;
        $this->userService = $userService;
    }

    public function index()
    {
        return view('orders')->with([
            'orders' => $this->orderService->get()
        ]);
    }

    public function saveOrder()
    {
        return view('saveOrder')->with([
            'users' => $this->userService->get()
        ]);
    }

    public function postOrder(Request $request)
    {
        $input = $request->input();

        $order = $this->orderService->saveOrUpdateOrder($input);

        return response()->json($order, 200);
    }

    public function getOrder($orderId)
    {
        $order = $this->orderService->getOrder($orderId);
        return response()->json($order, 200);
    }
}
