@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="row g-3">

    <div class="col-md-3">
        <div class="card card-soft stat-card">
            <h6>Total Products</h6>
            <h3>1,245</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft stat-card">
            <h6>Customers</h6>
            <h3>540</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft stat-card">
            <h6>Today's Sales</h6>
            <h3>$2,450</h3>
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

                        <tr>
                            <td>#1001</td>
                            <td>John</td>
                            <td>Today</td>
                            <td>$120</td>
                        </tr>

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

                    <li class="list-group-item">
                        Dell Mouse
                    </li>

                    <li class="list-group-item">
                        Keyboard
                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>

@endsection