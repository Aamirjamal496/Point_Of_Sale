@extends('layouts.app')

@section('title','Invoice')

@section('content')

<div class="card card-soft">

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-6">

                <h3>SMART POS</h3>

                <small>
                    Company Address Here
                </small>

            </div>

            <div class="col-md-6 text-end">

                <h4>Invoice #INV-1001</h4>

                <small>
                    Date: 20 Jun 2026
                </small>

            </div>

        </div>

        <hr>

        <h6>Customer Information</h6>

        <p>
            John Doe<br>
            03001234567
        </p>

        <table class="table mt-4">

            <thead>

                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>Dell Laptop</td>
                    <td>1</td>
                    <td>$1000</td>
                    <td>$1000</td>
                </tr>

            </tbody>

        </table>

        <div class="text-end">

            <h4>Total: $1000</h4>

        </div>

    </div>

</div>

@endsection