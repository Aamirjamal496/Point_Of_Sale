@extends('layouts.app')

@section('title','Reports')

@section('content')

<div class="row g-3">

    <div class="col-md-3">
        <div class="card card-soft">
            <div class="card-body">
                <small>Total Sales</small>
                @if($sales)
                <h4>Rs.{{$sales}}</h4>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft">
            <div class="card-body">
                <small>Total Purchases</small>
                @if($purchases)
                <h4>$34,800</h4>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft">
            <div class="card-body">
                <small>Profit</small>
                <h4>$17,650</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft">
            <div class="card-body">
                <small>Invoices</small>
                @if($invoice_count)
                <h4>{{$invoice_count}}</h4>
                @endif
            </div>
        </div>
    </div>

</div>

<div class="card card-soft mt-4">

    <div class="card-header bg-white">
        Report Filters
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">
                <label>From Date</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-4">
                <label>To Date</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-4">
                <label>Report Type</label>
                <select class="form-select">
                    <option>Sales Report</option>
                    <option>Purchase Report</option>
                    <option>Inventory Report</option>
                </select>
            </div>

        </div>

        <div class="mt-3">
            <a href="/reports/sales" class="btn btn-primary">
                Generate Report
            </a>

            <button class="btn btn-success">
                Export Excel
            </button>

            <button class="btn btn-danger">
                Export PDF
            </button>
        </div>

    </div>

</div>

@endsection