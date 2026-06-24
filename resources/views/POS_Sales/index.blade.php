@extends('layouts.app')

@section('title','POS Sales')

@section('content')

<div class="row">

    <!-- Products -->

    <div class="col-lg-8">

        <div class="card card-soft">

            <div class="card-header bg-white">

                <div class="row">

                    <div class="col-md-8">
                        <input type="text"
                            class="form-control"
                            placeholder="Search product...">
                    </div>

                    <div class="col-md-4">
                        <select class="form-select">
                            <option>All Categories</option>
                        </select>
                    </div>

                </div>

            </div>

            <div class="card-body">

                <div class="row g-3">

                    @for($i=1;$i<=12;$i++)

                        <div class="col-md-3">

                        <div class="card border">

                            <div class="card-body text-center">

                                <img src="https://placehold.co/100"
                                    class="img-fluid mb-2">

                                <h6>Dell Laptop</h6>

                                <small>$1000</small>

                            </div>

                        </div>

                </div>

                @endfor

            </div>

        </div>

    </div>

</div>

<!-- Cart -->

<div class="col-lg-4">

    <div class="card card-soft">

        <div class="card-header bg-white">
            Shopping Cart
        </div>

        <div class="card-body">

            <select class="form-select mb-3">
                <option>Select Customer</option>
            </select>

            <table class="table table-sm">

                <thead>

                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>Laptop</td>
                        <td>1</td>
                        <td>$1000</td>
                    </tr>

                </tbody>

            </table>

            <hr>

            <div class="d-flex justify-content-between">
                <span>Subtotal</span>
                <strong>$1000</strong>
            </div>

            <div class="d-flex justify-content-between">
                <span>Tax</span>
                <strong>$50</strong>
            </div>

            <div class="d-flex justify-content-between">
                <span>Discount</span>
                <strong>$0</strong>
            </div>

            <hr>

            <div class="d-flex justify-content-between">

                <h5>Total</h5>

                <h5>$1050</h5>

            </div>

            <div class="d-grid gap-2 mt-4">

                <button class="btn btn-warning">
                    Hold Sale
                </button>

                <button class="btn btn-success">
                    Checkout
                </button>

            </div>

        </div>

    </div>

</div>

</div>

@endsection