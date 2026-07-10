@extends('layouts.app')

@section('title','Products')

@section('content')

<div class="card card-soft">

    @if(session('success'))
    @endif
    @if(session('error'))
    @endif
    <div class="card-header bg-white d-flex justify-content-between">

        <div>

            <input type="text"
                class="form-control form-control-sm"
                placeholder="Search Product">

        </div>

        <a href='/products/add' class="btn btn-primary btn-sm">
            <i class="bi bi-plus"></i>
            Add Product
        </a>

    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    @if($product)

                    <td>{{$product->id}}</td>

                    <td>
                        <img src="{{asset('/storage/Product_Images/'.$product->product_image)}}"
                            class="rounded" style="width: 50px;">
                    </td>

                    <td>{{$product->product_name}}</td>
                    <td>{{$product->category->name}}</td>

                    <td>{{$product->stock}}</td>
                    <td>{{$product->selling_price}}</td>

                    <td>

                        <a href='/products/edit' class="btn btn-sm btn-warning">
                            Edit
                        </a>
                        <form action="{{url('/products/delete/'.$product->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button class="btn btn-sm btn-danger p-1">
                                Delete
                            </button>
                        </form>

                    </td>

                    @elseif(!$product)
                    <div class="container">
                        No Products Found
                    </div>
                    @endif
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection