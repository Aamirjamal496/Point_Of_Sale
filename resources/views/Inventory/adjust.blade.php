@extends('layouts.app')

@section('title','Adjust Inventories')

@section('content')
<div class="card card-soft">

    <div class="card-header bg-white">
        Stock Adjustment
    </div>

    <div class="card-body">

        <form action="/inventory/adjust" method="post">
            @csrf
            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Adjustment Type</label>

                    <select class="form-select" name="adjustment_type">
                        <option value="add">Add Stock</option>
                        <option value="remove">Remove Stock</option>
                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Product</label>

                    <select class="form-select" name="product_id">
                        <option>Select Product</option>
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Current Stock</label>

                    <input type="text"
                        readonly
                        class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Quantity</label>

                    <input type="number" name="quantity"
                        class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Reason</label>

                    <select name="reason" class="form-select">

                        <option>Damaged</option>
                        <option>Lost</option>
                        <option>Correction</option>
                        <option>Expired</option>
                        <option>Manual Addition</option>

                    </select>

                </div>

                <div class="row">

                    <div class="col-12 mb-3">

                        <label>Notes</label>

                        <textarea class="form-control" name="notes"></textarea>

                    </div>
                    <!-- <div class="col-12 mb-3"> -->

                    <!-- <label>Role</label> -->

                    Role :{{session('user_role.0.role')}}
                    <input type="hidden" name="role" value="{{session('user_role.0.role')}}" />
                    <!-- <select type="text" class="form-control" name="stock" readonly>
                            <option value="{{session('user_role.0.role')}}" default> {{session('user_role.0.role')}}</option>
                        </select> -->
                    <!-- </div> -->
                </div>

            </div>

            <button class="btn btn-primary">
                Save Adjustment
            </button>
            <a href="/inventory" class="btn btn-danger btn-sm">Back</a>

        </form>

    </div>

</div>
@endsection