<?php
namespace App\Http\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderRepository
{

    /** @var Order */
    protected $order;

    public function __construct(Order $order, OrderDetail $orderDetail)
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    public function get()
    {
        return $this->order->with('userDetail')->get();
    }

    public function saveOrUpdateOrder($order)
    {
        if(!empty($order['id'])){
            $this->order = $this->order->find($order['id']);
        }
        else
        {
            $this->order = new Order();
        }

        if(!empty($order['userId']))    $this->order->userId = $order['userId'];
        if(!empty($order['address']))    $this->order->address = $order['address'];
        if(!empty($order['totalAmount']))    $this->order->totalAmount = $order['totalAmount'];
        if(!empty($order['paymentStatus']))    $this->order->paymentStatus = $order['paymentStatus'];

        $this->order->save();
        $this->order->refresh();

        $this->saveOrderDetails($order['order_details'], $this->order->id);

        return $this->order->id;
    }

    public function saveOrderDetails($details, $orderId)
    {
        $ids = [];
        foreach($details as $detail)
        {
            if(!empty($detail['id'])){
                $this->orderDetail = $this->orderDetail->find($detail['id']);
            }
            else
            {
                $this->orderDetail = new OrderDetail();
            }

            $this->orderDetail->orderId = $orderId;

            if(!empty($detail['productId']))    $this->orderDetail->productId = $detail['productId'];
            if(!empty($detail['qty']))    $this->orderDetail->qty = $detail['qty'];
            if(!empty($detail['subtotal']))    $this->orderDetail->subtotal = $detail['subtotal'];

            $this->orderDetail->save();
            $this->orderDetail->refresh();
            array_push($ids, $this->orderDetail->id);
        }

        OrderDetail::where('orderId', $orderId)->whereNotIn('id', $ids)->delete();
    }

    public function deleteOrder($orderId)
    {
        $this->order->where('id', $orderId)->delete();
        $this->orderDetail->where('orderId', $orderId)->delete();
    }

    public function getOrder($orderId)
    {
        return $this->order->where('id', $orderId)->with('userDetail')->with('orderDetails')->first();
    }
}
