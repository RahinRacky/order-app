<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Models\OrderDetail;

class CartController extends Controller
{
    /** @var OrderController  */
    protected $orderController;

    public function __construct(OrderController $orderController)
    {
        $this->orderController = $orderController;
    }

    public function getCart()
    {
        $cart = Cart::join('products', 'products.id', 'carts.product_id')->where('carts.user_id', auth()->user()->id)->select('products.id as productId', 'products.product_name', 'products.price',  'carts.quantity')->get();
        $total = 0;
        if(!empty($cart)){
            foreach($cart as &$product)
            {
                $product->subtotal = $product->price * $product->quantity;
                $total += $product->subtotal;
            }
        }
        return view('cart')->with(['cart'=>$cart, 'total' => $total]);
    }

    public function addToCart($productId, $productScreen = false)
    {
        $cart = Cart::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->first();
        if(!empty($cart))
        {
            $cart->increment('quantity');
        }
        else
        {
            Cart::insert(['user_id' => auth()->user()->id, 'product_id' => $productId, 'quantity' => 1]);
        }
        if(!$productScreen)
            return redirect('cart');
    }

    public function reduceToCart($productId)
    {
        $cart = Cart::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->first();
        if(!empty($cart) && $cart->quantity > 1)
        {
            $cart->decrement('quantity');
        }
        else
        {
            $cart->delete();
        }
        return redirect('cart');
    }

    public function removeFromCart($productId)
    {
        $cart = Cart::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->delete();
        return redirect('cart');
    }

    public function checkout()
    {
        $cart = Cart::join('products', 'products.id', 'carts.product_id')->where('carts.user_id', auth()->user()->id)->select('products.id as productId', 'products.product_name', 'products.price',  'carts.quantity')->get();
        if(count($cart) == 0)
        {
            return redirect('home');
        }
        $total = 0;
        $orderDetails = [];
        if(!empty($cart)){
            foreach($cart as &$product)
            {
                $subtotal = $product->price * $product->quantity;
                $total += $subtotal;

                $detail = new OrderDetail();
                $detail->product_id = $product->productId;
                $detail->quantity = $product->quantity;
                $detail->subtotal = $subtotal;
                $orderDetails[] = $detail;
            }
        }
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total = $total;
        $order->save();
        $order->orderDetails()->saveMany($orderDetails);
        Cart::where('user_id', auth()->user()->id)->delete();
        return view('checkout');
    }
}
