@extends('layouts.app')

@section('title','Suppliers')

@section('content')

<div class="card card-soft">
    @if(session('success'))
    @endif
    @if(session('error'))
    @endif

    <div class="card-header bg-white d-flex justify-content-between">

        <h6 class="mb-0">Supplier List</h6>

        <a href="/suppliers/add" class="btn btn-primary btn-sm">
            Add Supplier
        </a>

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact Person</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{$supplier->supplier_name}}</td>
                    <td>{{$supplier->contact_person}}</td>
                    <td>{{$supplier->phone}}</td>
                    <td>{{$supplier->email}}</td>
                    <td>
                        <button class="btn btn-warning btn-sm">
                            Edit
                        </button>
                    </td>
                    <td>
                        <form action="{{url('/suppliers/delete/'.$supplier->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection