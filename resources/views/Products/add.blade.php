@extends('layouts.app')

@section('title','Add Product')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        Add New Product
    </div>

    <div class="card-body">

        <form>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Product Name</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Category</label>
                    <select class="form-select">
                        <option>Select Category</option>
                    </select>
                </div>
                <!-- 
                <div class="col-md-6 mb-3">
                    <label>Barcode</label>
                    <input type="text" class="form-control">
                </div> -->

                <div class="col-md-6 mb-3">
                    <label>Supplier</label>
                    <select class="form-select">
                        <option>Select Supplier</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Purchase Price</label>
                    <input type="number" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Selling Price</label>
                    <input type="number" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Stock</label>
                    <input type="number" class="form-control">
                </div>

                <!-- <div class="col-12 mb-3">
                    <label>Description</label>
                    <textarea rows="4" class="form-control"></textarea>
                </div> -->

                <div class="col-12 mb-3">
                    <label>Product Image</label>
                    <input type="file" class="form-control">
                </div>

            </div>

            <button class="btn btn-primary">
                Save Product
            </button>

            <a href="/products" class="btn btn-light">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection