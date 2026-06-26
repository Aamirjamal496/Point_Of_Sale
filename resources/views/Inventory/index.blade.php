@extends('layouts.app')

@section('title','Inventory')

@section('content')

<div class="card card-soft">
    <a class="btn btn-light btn-sm" href="/inventory/history">Inventroy History</a>

    <div class="card-header bg-white d-flex justify-content-between">

        <h6 class="mb-0">Inventory Status</h6>

        <a href="/inventory/adjust" class="btn btn-primary btn-sm">
            Stock Adjustment
        </a>

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
                    @foreach($products as $product)
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->sku}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->min_stock}}</td>
                    <td>
                        @if($product->min_stock <= $product->stock)
                            <span class="badge bg-success">
                                In Stock
                            </span>
                            @else
                            <span class="badge bg-danger">
                                Low Stock
                            </span>
                            @endif
                    </td>
                    @endforeach
                </tr>

                <!-- <tr>
                    <td>Mouse</td>
                    <td>MS001</td>
                    <td>3</td>
                    <td>10</td>
                    <td>
                        <span class="badge bg-danger">
                            Low Stock
                        </span>
                    </td>
                </tr> -->

            </tbody>

        </table>

    </div>

</div>

@endsection