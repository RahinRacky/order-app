@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts.sidebar')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body row text-center">
                    <div class="tex-center text-success">{{ __('Order Placed Successfully!!!') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
