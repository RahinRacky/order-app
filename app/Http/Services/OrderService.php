<?php
namespace App\Http\Services;

use App\Http\Repositories\OrderRepository;

class OrderService
{
    /** @var OrderRepository */
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function get()
    {
        return $this->orderRepository->get();
    }

    public function saveOrUpdateOrder($order)
    {
        return $this->orderRepository->saveOrUpdateOrder($order);
    }

    public function getOrder($orderId)
    {
        return $this->orderRepository->getOrder($orderId);
    }

    public function deleteOrder($orderId)
    {
        $this->orderRepository->deleteOrder($orderId);
    }

}
