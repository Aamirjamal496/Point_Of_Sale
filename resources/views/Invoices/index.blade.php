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
                @foreach($invoices as $invoice)
                <tr>

                    <td>{{$invoice->invoice_no}}</td>
                    <td>{{$invoice->customer->first()->name}}</td>
                    <td>{{$invoice->created_at}}</td>
                    <td>{{$invoice->grandtotal}}</td>

                    <td>

                        <a href="{{url('/invoices/show/'.$invoice->id)}}" class="btn btn-sm btn-primary">
                            View
                        </a>

                        <!-- <button onclick="window.print()" class="btn btn-sm btn-success">
                            Print
                        </button> -->

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>
        <div class="links w-2">
            {{$invoices->links()}}
        </div>

    </div>

</div>
<style>
    .w-5 {
        width: 10px;
    }

    .hidden {
        display: none;
    }

    .links {
        justify-items: center;
    }
</style>
@endsection