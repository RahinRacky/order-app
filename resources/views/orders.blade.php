@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Sidebar -->
    @include('sidenavbar')

    <div class="row justify-content-center">

        <div class="col-md-12">
            <a href="{{ route('saveOrder') }}"><button class="btn btn-success">Add New</button></a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order['userDetail']['name'] }}</td>
                            <td>{{ $order['address'] }}</td>
                            <td>{{ $order['totalAmount'] }}</td>
                            <td>{{ $order['paymentStatus'] == 0 ? 'Not Paid' : 'Paid' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
