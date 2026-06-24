@extends('layouts.app')

@section('title','Inventory')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white d-flex justify-content-between">

        <h6 class="mb-0">Inventory Status</h6>

        <button class="btn btn-primary btn-sm">
            Stock Adjustment
        </button>

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>Product</th>
                    <th>SKU</th>
                    <th>Stock</th>
                    <th>Minimum Stock</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>Dell Laptop</td>
                    <td>DL001</td>
                    <td>25</td>
                    <td>10</td>
                    <td>
                        <span class="badge bg-success">
                            In Stock
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>Mouse</td>
                    <td>MS001</td>
                    <td>3</td>
                    <td>10</td>
                    <td>
                        <span class="badge bg-danger">
                            Low Stock
                        </span>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection