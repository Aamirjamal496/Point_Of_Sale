@extends('layouts.app')

@section('title','Invoice')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <!-- Header -->
        <div class="card-header bg-white d-flex justify-content-between align-items-center">

            <div>
                <h4 class="mb-0">Sales Invoice</h4>
                <small class="text-muted">
                    Invoice #: {{ $sale->invoice_no }}
                </small>
            </div>

            <div>

                <button class="btn btn-primary btn-sm"
                    onclick="window.print()">
                    <i class="bi bi-printer"></i>
                    Print Invoice
                </button>
                <a href="{{'/reciept/'.$sale->id}}" class="btn btn-danger btn-sm"
                    target="_blank">
                    <i class="bi bi-printer"></i>
                    Reciept
                </a>

                <!-- <a href="/invoices"
                    class="btn btn-secondary btn-sm">
                    Back
                </a> -->

            </div>

        </div>

        <div class="card-body">

            <!-- Company & Invoice Info -->
            <div class="row mb-4">

                <div class="col-md-6">

                    <h5>Point of Sale</h5>

                    <p class="mb-1">
                        Garhi Kapura
                    </p>

                    <p class="mb-1">
                        Phone: +92 XXX XXXXXXX
                    </p>

                    <p class="mb-0">
                        Email: store@email.com
                    </p>

                </div>

                <div class="col-md-6 text-md-end">

                    <table class="table table-borderless table-sm">

                        <tr>
                            <th width="150">Invoice No</th>
                            <td>{{ $sale->invoice_no }}</td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td>{{ $sale->created_at->format('d M Y h:i A') }}</td>
                        </tr>

                        <tr>
                            <th>Cashier</th>
                            <td>{{ $sale->user->name ?? '-' }}</td>
                        </tr>

                    </table>

                </div>

            </div>

            <hr>

            <!-- Customer -->
            <div class="row mb-4">

                <div class="col-md-6">

                    <h6>Customer Information</h6>

                    @if($sale->customer)

                    <p class="mb-1">
                        <strong>Name:</strong>
                        {{ $sale->customer->name }}
                    </p>

                    <p class="mb-1">
                        <strong>Phone:</strong>
                        {{ $sale->customer->phone }}
                    </p>

                    <p class="mb-0">
                        <strong>Address:</strong>
                        {{ $sale->customer->address }}
                    </p>

                    @else

                    <p class="mb-0">
                        Walk-in Customer
                    </p>

                    @endif

                </div>

            </div>

            <!-- Products -->
            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60">#</th>

                            <th>Product</th>

                            <th width="120">Price</th>

                            <th width="100">Qty</th>

                            <th width="150">Subtotal</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($sale->items as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $item->product->product_name }}
                            </td>

                            <td>
                                Rs {{ number_format($item->sellingprice,2) }}
                            </td>

                            <td>
                                {{ $item->quantity }}
                            </td>

                            <td>
                                Rs {{ number_format($item->subtotal,2) }}
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <!-- Totals -->
            <div class="row mt-4">

                <div class="col-md-6">

                    <h6>Payment Information</h6>

                    <table class="table table-borderless table-sm">

                        <tr>
                            <th width="170">
                                Payment Method
                            </th>

                            <td>
                                {{ ucfirst($sale->paymentmethod) }}
                            </td>
                        </tr>

                        <tr>
                            <th>Amount Paid</th>

                            <td>
                                Rs {{ number_format($sale->amountpaid,2) }}
                            </td>
                        </tr>

                        <tr>
                            <th>Change Returned</th>

                            <td>
                                Rs {{ number_format($sale->change_return,2) }}
                            </td>
                        </tr>

                    </table>

                </div>

                <div class="col-md-6">

                    <table class="table table-bordered">

                        <tr>

                            <th>Subtotal</th>

                            <td class="text-end">
                                Rs {{ number_format($sale->subtotal,2) }}
                            </td>

                        </tr>

                        <tr>

                            <th>Discount</th>

                            <td class="text-end">
                                {{ $sale->discount }}%
                            </td>

                        </tr>

                        <tr class="table-light">

                            <th>Grand Total</th>

                            <th class="text-end">
                                Rs {{ number_format($sale->grandtotal,2) }}
                            </th>

                        </tr>

                    </table>

                </div>

            </div>

            <hr>

            <div class="text-center text-muted">

                <p class="mb-1">
                    Thank you for shopping with us.
                </p>

                <small>
                    This invoice was generated automatically by the Smart POS System.
                </small>

            </div>

        </div>

    </div>

</div>

@endsection

@push('styles')
<style>
    @media print {

        .btn,
        .navbar,
        .sidebar,
        footer {
            display: none !important;
        }

        .card {
            border: none;
            box-shadow: none !important;
        }

        body {
            background: #fff;
        }

    }
</style>
@endpush