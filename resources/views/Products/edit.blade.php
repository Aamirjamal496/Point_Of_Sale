@extends('layouts.app')

@section('title','Edit Product')

@section('content')

<div class="card card-soft">

    <div class="card-header bg-white">
        Edit Product
    </div>

    <div class="card-body">
        <!-- <button class="btn btn-info" onclick="LoadFormData()">Edit User</button> -->
        <form action="/products/update" method="post">
            <input type="hidden" id="product_id" name="id"/>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Product Name</label>
                    <input type="text"
                        class="form-control"
                  id="pd_name" name="pd_name">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Category</label>
                    <select class="form-select">
                        <option id="pd_category"></option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Cost Price</label>
                    <input type="number"
                    class="form-control" id="pd_costprice" name="pd_cost"/>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Sale Price</label>
                    <input type="number"
                       
                        class="form-control" id="pd_saleprice" name="pd_sale"/>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Stock</label>
                    <input type="number"
                        
                        class="form-control" id="pd_stock" name="pd_stock"/>
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
<script>
    window.onload=function(){
        const currentURL = window.location.href;
        const parts = currentURL.split('/');
        const productId = parts[parts.length -1];
    
        fetch('/products/edit_values/' + productId).then(function (response){
            return response.json();
        }).then(function(data){
            // return console.log(data.product.category.name);
           document.getElementById('product_id').value=data.product.id;
            document.getElementById('pd_name').value=data.product.product_name;
            document.getElementById('pd_category').textContent=data.product.category.name;
            document.getElementById('pd_category').value=data.product.category.id;
            document.getElementById('pd_costprice').value=data.product.purchase_price;
            document.getElementById('pd_saleprice').value=data.product.selling_price;
            document.getElementById('pd_stock').value=data.product.stock;
        }).catch(function(error){
            console.log('Error:',error);
            alert('Error loading product data');
        });
}    
</script>