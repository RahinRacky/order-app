@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Sidebar -->
    @include('sidenavbar')

    <div class="row justify-content-center">

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product['productName'] }}</td>
                            <td>{{ $product['productCode'] }}</td>
                            <td>{{ $product['price'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
