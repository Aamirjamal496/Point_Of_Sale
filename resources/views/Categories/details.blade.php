@extends('layouts.app')

@section('title','Category Details')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Category Details
        </h5>

        <a href="{{url('/categories')}}" class="btn btn-secondary btn-sm">
            Back
        </a>

    </div>


    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-4">
                <div class="card card-soft p-3">
                    <h6>Category Name</h6>
                    <h4>{{$category->name}}</h4>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card card-soft p-3">
                    <h6>Total Products</h6>
                    <h4>{{$category->products->count()}}</h4>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card card-soft p-3">
                    <h6>Category Created</h6>
                    <h5>
                        {{$category->created_at->format('d M Y')}}
                    </h5>
                </div>
            </div>

        </div>


        <h5 class="mb-3">
            Products
        </h5>


        <table class="table table-hover">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Purchase Price</th>
                    <th>Selling Price</th>
                    <th>Status</th>
                </tr>
            </thead>


            <tbody>

                @forelse($category->products as $product)

                <tr>

                    <td>
                        {{$product->id}}
                    </td>

                    <td>
                        {{$product->product_name}}
                    </td>

                    <td>
                        {{$product->stock}}
                    </td>

                    <td>
                        {{$product->purchase_price}}
                    </td>
                    <td>
                        {{$product->selling_price}}
                    </td>

                    <td>

                        @if($product->stock > 0)

                        <span class="badge bg-success">
                            Available
                        </span>

                        @else

                        <span class="badge bg-danger">
                            Out of Stock
                        </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center">
                        No Products Found
                    </td>
                </tr>

                @endforelse


            </tbody>

        </table>


    </div>

</div>

@endsection