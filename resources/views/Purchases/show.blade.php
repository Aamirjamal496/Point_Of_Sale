@extends('layouts.app')

@section('title','Purchase Details')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">

        Purchase #PUR-1001

    </div>

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-6">
                <strong>Supplier:</strong> ABC Traders
            </div>

            <div class="col-md-6 text-end">
                <strong>Date:</strong> 12 Jun 2026
            </div>

        </div>

        <table class="table">

            <thead>

                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Cost</th>
                    <th>Total</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>Dell Laptop</td>
                    <td>5</td>
                    <td>$800</td>
                    <td>$4,000</td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection