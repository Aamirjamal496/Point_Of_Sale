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

                @foreach($purchases as $purchase)
                <tr>
                    <td>{{$purchase->id}}</td>
                    @if($supplier)
                    <td>{{$supplier->supplier_name}}</td>
                    @endif
                    <td>{{$purchase->purchase_date}}</td>
                    <td>${{number_format($purchase->total, 2)}}</td>
                    <td>
                        <span class="badge bg-success">
                            Completed
                        </span>
                    </td>
                    <td>
                        <a href="{{url('/purchases/show/'.$purchase->id)}}" class="btn btn-sm btn-outline-primary">
                            View
                        </a>
                        <!-- </td> -->
                        <!-- <td> -->
                        <!-- Check and loop through the relationship object -->
                        <!-- @if($purchase->purchaseItems && $purchase->purchaseItems->isNotEmpty()) -->
                        <!-- <ul> -->
                        <!-- @foreach ($purchase->purchaseItems as $item) -->
                        <!-- <li> -->
                        <!-- <strong>Item ID:</strong> {{ $item->id }} | -->
                        <!-- <strong>Product ID:</strong> {{ $item->product_id }} | -->
                        <!-- <strong>Qty:</strong> {{ number_format($item->quantity, 0) }} | -->
                        <!-- <strong>Cost:</strong> ${{ number_format($item->cost_price, 2) }} | -->
                        <!-- <strong>Subtotal:</strong> ${{ number_format($item->subtotal, 2) }} -->
                        <!-- </li> -->
                        <!-- @endforeach -->
                        <!-- </ul> -->
                        <!-- @else -->
                        <!-- <span>No items found.</span> -->
                        <!-- @endif -->
                        <!-- </td> -->
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection