@extends('layouts.app')

@section('title','Products')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white d-flex justify-content-between">

        <div>

            <input type="text"
                class="form-control form-control-sm"
                placeholder="Search Product">

        </div>

        <a href='/products/add' class="btn btn-primary btn-sm">
            <i class="bi bi-plus"></i>
            Add Product
        </a>

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>1</td>

                    <td>
                        <img src="https://placehold.co/50"
                            class="rounded">
                    </td>

                    <td>Laptop</td>
                    <td>Electronics</td>
                    <td>20</td>
                    <td>$1000</td>

                    <td>

                        <a href='/products/edit' class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection