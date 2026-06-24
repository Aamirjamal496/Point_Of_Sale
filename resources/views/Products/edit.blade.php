@extends('layouts.app')

@section('title','Edit Product')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        Edit Product
    </div>

    <div class="card-body">

        <form>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Product Name</label>
                    <input type="text"
                        class="form-control"
                        value="Dell Laptop">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Category</label>
                    <select class="form-select">
                        <option>Laptops</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Cost Price</label>
                    <input type="number"
                        value="800"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Sale Price</label>
                    <input type="number"
                        value="1000"
                        class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Stock</label>
                    <input type="number"
                        value="20"
                        class="form-control">
                </div>

                <div class="col-12 mb-3">
                    <label>Description</label>
                    <textarea class="form-control">Product Description</textarea>
                </div>

            </div>

            <button class="btn btn-success">
                Update Product
            </button>

        </form>

    </div>

</div>

@endsection