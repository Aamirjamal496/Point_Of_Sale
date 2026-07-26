@extends('layouts.app')

@section('title','Sales Report')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        {{$Report_type}}
    </div>

    <div class="card-body">
@if($report_Ondate->isEmpty())

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <tr>
                    <th>Message</th>
                </tr>
                <td>
                    No Report Found On This Date
                </td>
            </table>
        </div>
        @else
        
        @if($Report_type== "Sales Report")
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Invoice #</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <!-- <th>Items</th> -->
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($report_Ondate as $report)
                <tr>
                    <td>{{$report->invoice_no}}</td>
                    <td>{{$report->customer->name}}</td>
                    <td>{{$report->created_at}}</td>
                    <!-- <td>4</td> -->
                    <td>{{$report->grandtotal}}</td>
                    <td><a href="{{url('/invoices/show/'.$report->id)}}" class="btn btn-sm btn-primary">
                            View
                        </a></td>
                </tr>
                @endforeach
                
                
            </tbody>
            
        </table>
        @elseif($Report_type == "Purchase Report")
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

                @foreach($report_Ondate as $purchase)
                <tr>
                    <td>{{$purchase->id}}</td>
                    @if($purchase->supplier)
                    <td>{{$purchase->supplier->supplier_name}}</td>
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
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>
        @elseif($Report_type == "Inventory Report")
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
                    @foreach($report_Ondate as $transaction)
                    <tr>

                        <td>{{$transaction->id}}</td>

                        <td>{{$transaction->created_at->format('d/m/Y')}}</td>
                        @if($transaction->product)
                        <td>{{$transaction->product->product_name}}</td>
                        <td>{{$transaction->product->sku}}</td>
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

                </tbody>

            </table>

        </div>
        @endif
        @endif

    </div>

</div>

@endsection