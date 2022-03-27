@section('sidenavbar')
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <h1>Order App</h1>
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action py-2 ripple" aria-current="true" >
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('order') }}" class="list-group-item list-group-item-action py-2 ripple">
                    <span>Orders</span>
                </a>
                <a href="{{ route('product') }}" class="list-group-item list-group-item-action py-2 ripple">
                    <span>Products</span>
                </a>
                <a href="{{ route('user') }}" class="list-group-item list-group-item-action py-2 ripple">
                    <span>Users</span>
                </a>
            </div>
        </div>
    </nav>
    @endsection
