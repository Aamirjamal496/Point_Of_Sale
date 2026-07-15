@extends('layouts.app')

@section('title','Customer Details')

@section('content')

<div class="row">

    @if($customers)
    <div class="col-md-3 h-2">

        <div class="card card-soft">

            <div class="card-body text-center">

                <img src="https://placehold.net/avatar-5.svg"
                    class="rounded-circle mb-2" style="width: 5rem;">

                <h6>{{$customers->name}}</h5>

                    <p>{{$customers->email}}</p>

                    <span>{{$customers->phone}}</span>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card card-soft">

            <div class="card-header bg-white">
                Purchase History
            </div>

            <div class="card-body">

                <table class="table">

                    <thead>

                        <tr>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Total</th>
                        </tr>

                    </thead>

                    <tbody>
                        @forelse($customers->sale as $sale)
                        <tr>
                            <td><a href="{{'/invoices/show/'.$sale->id}}">{{$sale->invoice_no}}</a></td>
                            <td>{{$sale->created_at}}</td>
                            <td>{{$sale->grandtotal}}</td>
                            @empty
                            <td>No sale found for this custommer</td>
                        </tr>
                        @endforelse
                        <!-- <tr>
                            <ul>
                            </ul>
                        </tr> -->
                    </tbody>

                </table>

            </div>

        </div>

    </div>
    @endif

</div>

@endsection