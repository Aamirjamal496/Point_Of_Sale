@extends('layouts.app')

@section('title','Purchases')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <h6 class="mb-0">Purchase History</h6>

        <a href="/purchases/add" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i>
            New Purchase
        </a>

    </div>

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th>Purchase #</th>
                    <th>Supplier</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>PUR-1001</td>
                    <td>ABC Traders</td>
                    <td>12 Jun 2026</td>
                    <td>$2,500</td>
                    <td>
                        <span class="badge bg-success">
                            Completed
                        </span>
                    </td>
                    <td>
                        <a href="/purchases/show" class="btn btn-sm btn-outline-primary">
                            View
                        </a>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection