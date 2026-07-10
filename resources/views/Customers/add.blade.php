@extends('layouts.app')

@section('title','Add Customer')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        Add New Customer
    </div>

    <div class="card-body">

        <form action="/customer/add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Customer Name</label>
                    <input type="text" name="name" class="form-control {{$errors->first()?'input-error':''}}" />
                    <span class="text-danger error-message">@error('name'){{$message}}@enderror</span>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="number" class="form-control {{$errors->first()?'input-error':''}}" name="phone">
                    <span class="text-danger error-message">@error('phone'){{$message}}@enderror</span>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control {{$errors->first()?'input-error':''}}">
                    <span class="text-danger error-message">@error('email'){{$message}}@enderror</span>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Address</label>
                    <!-- <input type="number" name="purchase_price" class="form-control"> -->
                    <textarea name="address" id="" class="form-control {{$errors->first()?'input-error':''}}"></textarea>
                    <span class="text-danger error-message">@error('address'){{$message}}@enderror</span>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <select class="form-select {{$errors->first()?'input-error':''}}" name="status">
                        <option value="" disabled selected>Customer Status</option>
                        <option value="active">Active</option>
                        <option value="non-active">Non Active</option>
                    </select>
                    <span class="text-danger error-message">@error('status'){{$message}}@enderror</span>

                </div>

                <!-- <div class="col-12 mb-3">
                    <label>Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div> -->

            </div>

            <button class="btn btn-primary">
                Save Customer
            </button>

            <a href="/customers" class="btn btn-light">
                Cancel
            </a>

        </form>

    </div>

</div>

@endsection
<style>
    .error-message {

        border-radius: 3px;
        padding: 4px 10px 4px 10px;
        margin: 2px;


    }
</style>