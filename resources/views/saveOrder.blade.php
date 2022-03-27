@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Sidebar -->
    @include('sidenavbar')

    <div class="row justify-content-center">

        <div class="container">
            <form id="myForm">
            <div class="card">
                <div class="card-header">{{ "Order" }}</div>
                <div class="card-body">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <select class="form-control" id="name">
                                        @foreach ($users as $user)
                                            <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Address:</label>
                                    <input type="text" class="form-control" id="address">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Total:</label>
                                    <input type="text" class="form-control" id="totalAmount">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Payment Status:</label>
                                    <select class="form-control" id="paymentStatus">
                                        <option value="0">Not Paid</option>
                                        <option value="1">Paid</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ "Order Details" }}</div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-stripped">
                            <thead>
                                <th></th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" onclick="saveOrder(event)" style="margin-top: 15px">Submit</button>
        </form>
    </div>
    </div>
</div>
@endsection
