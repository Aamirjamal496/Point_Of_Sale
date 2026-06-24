@extends('layouts.app')

@section('title','Customers')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white d-flex justify-content-between">

        <h6 class="mb-0">
            Customer List
        </h6>

        <button class="btn btn-primary btn-sm">
            Add Customer
        </button>

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Total Purchases</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <tr>

                    <td>John Doe</td>
                    <td>03001234567</td>
                    <td>john@gmail.com</td>
                    <td>$1,250</td>

                    <td>
                        <button class="btn btn-warning btn-sm">
                            Edit
                        </button>
                        <a href="/customer/details" class="btn btn-info btn-sm">
                            Details
                        </a>
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection