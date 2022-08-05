@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.sidebar')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body row text-center">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>
                            </thead>
                            <tbody>
                                @if(count($cart) == 0)
                                <tr><td colspan="4">{{ __('Please Add Product!!!') }}</td></tr>
                                @endif
                                @foreach ($cart as $product)
                                    <tr><td>{{ $product->product_name }}</td><td>{{ $product->price }}</td><td><a href="{{ url('/cart/add/' . $product->productId) }}" class="btn btn-outline-success"><i class="fa fa-plus"></i></a> &nbsp; {{ $product->quantity }} &nbsp; <a href="{{ url('/cart/reduce/' . $product->productId) }}" class="btn btn-outline-warning"><i class="fa fa-minus"></i></a> &nbsp; <a href="{{ url('/cart/remove/' . $product->productId) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td><td>{{ sprintf("%0.2f", $product->subtotal) }}</td></tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr><th colspan="3" class="text-right">Total</th><th>{{ sprintf("%0.2f", $total) }}</th></tr>
                            </tfoot>
                        </table>
                        <a href="{{ url('/cart/checkout') }}" class="btn btn-primary text-center">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
