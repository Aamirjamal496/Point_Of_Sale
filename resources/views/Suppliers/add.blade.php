@extends('layouts.app')

@section('title','Add Supplier')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        Add Supplier
    </div>

    <div class="card-body">

        <form>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Supplier Name</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Contact Person</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control">
                </div>

                <div class="col-12 mb-3">
                    <label>Address</label>
                    <textarea class="form-control"></textarea>
                </div>

            </div>

            <button class="btn btn-primary">
                Save Supplier
            </button>

        </form>

    </div>

</div>

@endsection