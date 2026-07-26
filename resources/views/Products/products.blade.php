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
                placeholder="Search Product" id='tableSearch'>

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
                    <th>Selling Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

            </thead>

            <tbody>
                @foreach($products as $product)
                <tr class="product-row">
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

                    <td><a href="{{url('/products/edit/'.$product->id)}}" class="btn btn-sm btn-warning px-2.5">
                        Edit
                    </a></td>
                    <td>

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
<script>
    // function filterProducts(){
    //     let SearchVal =document.getElementById='SearchInput'.value.toLowerCase();
    //     let card =document.getElementById='ProductsCard';
    //     // 3. Loop through cards to check text matches
    //         for (let i = 0; i < cards.length; i++) {
    //             const cardText = cards[i].innerText.toLowerCase();
                
    //             // 4. Toggle visibility using a CSS rule
    //             if (cardText.includes(query)) {
    //                 cards[i].classList.remove('hidden');
    //             } else {
    //                 cards[i].classList.add('hidden');
    //             }
    //         }
    // }
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('tableSearch');
    
    // Check if the input actually exists on the page first
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('.product-row');

            rows.forEach(function(row) {
                const rowText = row.innerText.toLowerCase();
                if (rowText.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});



</script>