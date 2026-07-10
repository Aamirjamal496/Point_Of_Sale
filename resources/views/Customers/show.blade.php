@extends('layouts.app')

@section('title','Customer Details')

@section('content')

<div class="row">

    @foreach($customers as $customer)
    <div class="col-md-3 h-2">

        <div class="card card-soft">

            <div class="card-body text-center">

                <img src="https://placehold.net/avatar-5.svg"
                    class="rounded-circle mb-2" style="width: 5rem;">

                <h6>{{$customer->name}}</h5>

                    <p>{{$customer->email}}</p>

                    <span>{{$customer->phone}}</span>

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

                        <tr>
                            <td>INV-1001</td>
                            <td>20 Jun 2026</td>
                            <td>$500</td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>
    @endforeach

</div>

@endsection