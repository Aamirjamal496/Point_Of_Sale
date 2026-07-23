@extends('layouts.app')

@section('title','Inventory History')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <h6 class="mb-0">
            Inventory History
        </h6>

        <a href="/inventory"
            class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

    </div>

    <div class="card-body">

        <!-- <div class="row mb-4">

            <div class="col-md-4">
                <input type="text"
                    class="form-control"
                    placeholder="Search Product">
            </div>

            <div class="col-md-3">
                <select class="form-select">
                    <option>All Transactions</option>
                    <option>Purchase</option>
                    <option>Sale</option>
                    <option>Adjustment</option>
                    <option>Return</option>
                    <option>Damage</option>
                </select>
            </div>

            <div class="col-md-3">
                <input type="date"
                    class="form-control">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    Filter
                </button>
            </div>

        </div> -->

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Transaction</th>
                        <th>Quantity</th>
                        <th>Stock After</th>
                        <!-- <th>Reason</th>
                        <th>User</th> -->
                    </tr>

                </thead>

                <tbody>
                    @if($transactions)
                    @foreach($transactions as $transaction)
                    <tr>

                        <td>{{$transaction->id}}</td>

                        <td>{{$transaction->created_at->format('d/m/Y')}}</td>
                        @if($product)
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->sku}}</td>
                        @endif

                        @if($transaction->type =="purchase")
                        <td>
                            <span class="badge bg-success">
                                {{$transaction->type}}
                            </span>
                        </td>
                        @else
                        <td>
                            <span class="badge bg-primary">
                                {{$transaction->type}}
                            </span>

                        </td>
                        @endif

                        <td class="text-success">
                            {{$transaction->quantity}}
                        </td>

                        <td>{{$transaction->stock_after}}</td>

                        <td>{{$transaction->reason}}</td>

                        <td>{{$transaction->role}}</td>
                    </tr>
                    @endforeach
                    @else
                    <span class="bg-danger w-2xl">No history Found</span>
                    @endif
                    

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection