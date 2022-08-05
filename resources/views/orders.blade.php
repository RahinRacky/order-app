@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.sidebar')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body row text-center">
                    <div class="col-md-12">
                        <table class="table table-dark">
                            <thead class="thead-dark">
                                <tr><th>Order Id</th><th>Total</th><th></th></tr>
                            </thead>
                            <tbody>
                                @if(count($orders) == 0)
                                <tr><td colspan="2">{{ __('No Orders!!!') }}</td></tr>
                                @endif
                                @foreach ($orders as $order)
                                    <tr class="table-primary"><td>{{ $order->id }}</td><td>{{ sprintf("%0.2f", $order->total) }}</td><td></td></tr>
                                    @if(count($order->orderDetails) > 0)
                                        <tr class="table-success">
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">SubTotal</th>
                                        </tr>
                                        @foreach ($order->orderDetails as $detail)
                                            <tr class="table-success"><td>{{ $detail->product_name }}</td><td>{{ $detail->quantity }}</td><td>{{ sprintf("%0.2f", $detail->subtotal) }}</td></tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
