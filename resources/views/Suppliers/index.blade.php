@extends('layouts.app')

@section('title','Suppliers')

@section('content')

<div class="card card-soft">

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
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>ABC Traders</td>
                    <td>Ali</td>
                    <td>03001234567</td>
                    <td>abc@gmail.com</td>
                    <td>
                        <button class="btn btn-warning btn-sm">
                            Edit
                        </button>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection