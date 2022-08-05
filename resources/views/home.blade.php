@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.sidebar')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome ' . Auth::user()->name) }}</div>

                <div class="card-body row text-center">
                    @foreach ($categories as $category)
                    <div class="col-md-6">
                        <a href="{{ url("/product-category/" . $category->id)  }}" class="text-decoration-none">
                            <img src="{{ asset($category->product_category_image)}}" alt="{{ $category->product_category }}" style="width: 200px;height:200px">
                            <h2>{{ $category->product_category }}</h2>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
