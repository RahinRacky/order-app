@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Sidebar -->
    @include('sidenavbar')

    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ "Orders" }}</div>
                <div class="card-body">
                    <h1 class="text-center">{{ $orders ?? 0  }}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ "Products" }}</div>
                <div class="card-body">
                    <h1 class="text-center">{{ $products ?? 0  }}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ "Users" }}</div>
                <div class="card-body">
                    <h1 class="text-center">{{ $users ?? 0  }}</h1>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
