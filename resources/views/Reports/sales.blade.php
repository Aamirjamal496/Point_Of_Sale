@extends('layouts.app')

@section('title','Sales Report')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        Sales Report
    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Invoice #</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>INV-1001</td>
                    <td>John Doe</td>
                    <td>20 Jun 2026</td>
                    <td>4</td>
                    <td>$500</td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection