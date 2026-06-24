@extends('layouts.app')

@section('title','Invoices')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        Invoice Records
    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>Invoice #</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>INV-1001</td>
                    <td>John Doe</td>
                    <td>20 Jun 2026</td>
                    <td>$1,250</td>

                    <td>

                        <a href="/invoices/show" class="btn btn-sm btn-primary">
                            View
                        </a>

                        <button class="btn btn-sm btn-success">
                            Print
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection