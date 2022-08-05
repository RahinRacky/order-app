@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.sidebar')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome ' . Auth::user()->name) }}</div>

                <div class="card-body row text-center">
                    @foreach ($products as $product)
                    <div class="col-md-4 p-3">
                            <img src="{{ asset($product->product_image)}}" alt="{{ $product->product_name }}" style="width: 200px;height:200px">
                            <h2>{{ $product->product_name }}</h2>
                            @if (empty($product->quantity))
                                <a href="{{ url('product/addToCart/' . $product->product_category_id . '/' . $product->id ) }}" class="btn btn-success">Add To Cart</a>
                            @else
                                <a href="#" class="btn btn-outline-success">Added To Cart</a>
                            @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
