@extends('layouts.app')

@section('title','Create Purchase')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <div class="card card-soft mb-3">

            <div class="card-header bg-white">
                Purchase Information
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4">
                        <label>Supplier</label>
                        <select class="form-select">
                            <option>Select Supplier</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Purchase Date</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Reference No</label>
                        <input type="text" class="form-control">
                    </div>

                </div>

            </div>

        </div>

        <div class="card card-soft">

            <div class="card-header bg-white">
                Purchase Items
            </div>

            <div class="card-body">

                <table class="table">

                    <thead>

                        <tr>
                            <th>Product</th>
                            <th width="120">Qty</th>
                            <th width="150">Cost</th>
                            <th width="150">Subtotal</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                <select class="form-select">
                                    <option>Select Product</option>
                                </select>
                            </td>

                            <td>
                                <input type="number" class="form-control">
                            </td>

                            <td>
                                <input type="number" class="form-control">
                            </td>

                            <td>
                                $0.00
                            </td>

                        </tr>

                    </tbody>

                </table>

                <div class="text-end">

                    <h5>Total: $0.00</h5>

                    <button class="btn btn-success">
                        Save Purchase
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection