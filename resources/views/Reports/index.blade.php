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
                @if($total_purchase)
                <h4>{{$total_purchase}}</h4>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-soft">
            <div class="card-body">
                <small>Profit</small>
                @if($profit)
                <h4>Rs.{{$profit}}</h4>
                @endif
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

    <form action="/reports/sales" class="card-body" method="GET">
        @csrf
        <div class="row">

            <div class="col-md-4">
                <label>From Date</label>
                <input type="date" name="start_date" class="form-control">
            </div>

            <div class="col-md-4">
                <label>To Date</label>
                <input type="date" name="end_date" class="form-control">
            </div>

            <div class="col-md-4">
                <label>Report Type</label>
                <select class="form-select" name="report_type">
                    <option value="Sales Report">Sales Report</option>
                    <option value="Purchase Report">Purchase Report</option>
                    <option value="Inventory Report">Inventory Report</option>
                </select>
            </div>

        </div>

        <div class="mt-3">
            <button class="btn btn-primary">
                Generate Report
            </button>

            <!-- <a class="btn btn-success">
                Export Excel
        </a>
        
            <a class="btn btn-danger">
                Export PDF
        </a> -->
        </div>
        
    </form>
    
</div>

@endsection