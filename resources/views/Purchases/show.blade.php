@extends('layouts.app')

@section('title','Purchase Details')

@section('content')

<div class="card card-soft">

    <a class="btn btn-light btn-sm" href="/purchases">Back</a>
    @if($purchases)
    <div class="card-header bg-white">

        Purchase #{{$purchases->id}}

    </div>

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-6">
                @if($supplier)
                <strong>Supplier:</strong> {{$supplier->supplier_name}}
                @endif
            </div>

            <div class="col-md-6 text-end">
                <strong>Date:</strong> {{$purchases->purchase_date}}
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
                    @if($product)
                    <td>{{$product->product_name}}</td>
                    @endif
                    @if($purchases->purchaseItems)
                    @foreach($purchases->purchaseItems as $item)
                    <td>{{number_format($item->quantity, 0)}}</td>
                    <td>{{number_format($item->cost_price, 2)}}</td>
                    @endforeach
                    @endif
                    <td>{{number_format($purchases->total, 2)}}</td>
                </tr>

            </tbody>

        </table>

    </div>
    @endif
</div>

@endsection