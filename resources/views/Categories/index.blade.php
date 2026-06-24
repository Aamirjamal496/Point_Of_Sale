@extends('layouts.app')

@section('title','Categories')

@section('content')

<div class="card card-soft">

    <!-- @if(session()->has('success'))
    <div class="bg-success text-success-700">{{session('success')}}</div>
    @elseif(session()->has('failed'))
    <div class="bg-danger-400 text-danger-700">{{session('failed')}}</div>
    @endif -->
    @if(session('success'))
    @endif

    @if(session('error'))
    @endif
    <div class="card-header bg-white d-flex justify-content-between">

        <h6 class="mb-0">Category List</h6>

        <button class="btn btn-primary btn-sm"
            data-bs-toggle="modal"
            data-bs-target="#categoryModal">
            Add Category
        </button>

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>120</td>
                    <td>
                        <button class="btn btn-warning btn-sm">
                            Edit
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="modal fade" id="categoryModal">

    <div class="modal-dialog">

        <form action="/categories/add-category" method="post" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5>Add Category</h5>
            </div>

            <div class="modal-body">

                <input type="text"
                    name="cat_name"
                    class="form-control"
                    placeholder="Category Name">

            </div>

            <div class="modal-footer">

                <button class="btn btn-primary">
                    Save
                </button>

            </div>

        </form>

    </div>

</div>

@endsection