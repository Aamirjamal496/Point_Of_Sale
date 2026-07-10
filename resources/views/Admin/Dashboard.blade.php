@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="row g-3">
    @if(session('success'))
    @endif
    @if(session('error'))
    @endif

    <div class="col-md-3">
        <div class="card card-soft stat-card">
            <h6>Total Products</h6>
            @if($products)
            <h3>{{$products}}</h3>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft stat-card">
            <h6>Customers</h6>
            @if($customers)
            <h3>{{$customers}}</h3>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft stat-card">
            <h6>Today's Sales</h6>
            @if($today_sale)
            <h3>{{$today_sale}}</h3>
            @else
            <h3>No sale today</h3>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft stat-card">
            <h6>Low Stock</h6>
            <h3>15</h3>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card card-soft">

            <div class="card-header bg-white">
                Recent Sales
            </div>

            <div class="card-body">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($recent_sale)
                        <tr>
                            <td>{{$recent_sale->invoice_no}}</td>
                            <td>{{$recent_sale->customer->name ?? '-'}}</td>
                            <td>{{$recent_sale->created_at}}</td>
                            <td>{{$recent_sale->grandtotal}}</td>
                        </tr>
                        @endif

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card card-soft">

            <div class="card-header bg-white">
                Low Stock Products
            </div>

            <div class="card-body">

                <ul class="list-group">
                    @if($low_stock)
                    @foreach($low_stock as $stock)

                    <li class="list-group-item">
                        {{$stock->product_name}}
                    </li>
                    @endforeach
                    @else
                    <li>No Items With Low Stock</li>
                    @endif
                </ul>

            </div>

        </div>

    </div>

</div>

@endsection