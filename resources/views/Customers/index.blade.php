@extends('layouts.app')

@section('title','Customers')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white d-flex justify-content-between">

        <h6 class="mb-0">
            Customer List
        </h6>

        <a href="customer/add" class="btn btn-primary btn-sm">
            Add Customer
        </a>

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

                @foreach($customers as $customer)
                <tr>

                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                    @if($total_sale)
                    <td>{{$total_sale}}</td>
                    @endif
                    <td>
                        <form action="{{'/customer/delete/'.$customer->id}}" method="post">
                            @csrf
                            <input type="hidden" name="__method" value="delete">
                            <button class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                        <a href="{{'/customer/details/'.$customer->id}}" class="btn btn-info btn-sm">
                            Details
                        </a>
                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection