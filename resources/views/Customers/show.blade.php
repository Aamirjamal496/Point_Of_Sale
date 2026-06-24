@extends('layouts.app')

@section('title','Customer Details')

@section('content')

<div class="row">

    <div class="col-md-4">

        <div class="card card-soft">

            <div class="card-body text-center">

                <img src="https://placehold.co/120"
                    class="rounded-circle mb-3">

                <h5>John Doe</h5>

                <p>john@gmail.com</p>

                <p>03001234567</p>

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

</div>

@endsection