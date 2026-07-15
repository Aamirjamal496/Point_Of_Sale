@extends('layouts.app')

@section('title','POS Sales')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<div class="row g-3">

    {{-- ================= PRODUCTS ================= --}}
    <div class="col-lg-8">

        <div class="card">

            {{-- SEARCH --}}
            <div class="card-header bg-white">

                <div class="row g-2">

                    <div class="col-md-8">
                        <input type="text"
                            id="searchInput"
                            class="form-control"
                            placeholder="Search product...">
                    </div>

                    <div class="col-md-4">
                        <select id="categoryFilter" class="form-select">
                            <option value="all">All Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>

            {{-- PRODUCTS --}}
            <div class="card-body">

                <div class="row g-3">

                    @foreach($products as $product)

                    <div class="col-6 col-md-4 product-item"
                        data-id="{{ $product->id }}"
                        data-name="{{ trim(strtolower($product->product_name)) }}"
                        data-category="{{ $product->category_id }}"
                        data-price="{{ $product->selling_price }}">

                        <div class="card product-card h-100"
                            onclick="addToCart(this)">

                            <div class="card-body text-center">

                                <img src="{{ asset('storage/Product_Images/'.$product->product_image) }}"
                                    style="height:70px">

                                <h6 class="mt-2 mb-1">{{ $product->product_name }}</h6>

                                <small>Rs {{ $product->selling_price }}</small>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

    {{-- ================= CART ================= --}}
    <div class="col-lg-4">

        <div class="card">

            <div class="card-header bg-white">
                <b>Cart</b>
            </div>

            <div class="card-body">

                <select class="form-select mb-2" id="customer_id">
                    <option>Select Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>

                <table class="table table-sm">

                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody id="cartTable"></tbody>

                </table>

                <hr>

                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <b id="subtotal">0</b>
                </div>

                <div class="mb-2">
                    <label class="form-label">Discount</label>
                    <input type="number" id="discountInput" class="form-control" value="0"  min="0" placeholder="Enter discount">
                </div>

                <div class="d-flex justify-content-between">
                    <span>Total</span>
                    <b id="total">0</b>
                </div>
                <div class="d-flex justify-content-between mt-1">
                    <!-- <span>Payment Method</span> -->
                    <!-- <label for="paymentmethod" class="form-label">Payment Method</label> -->
                    <select type="text" class="form-select form-select-sm" name="paymentmethod" id="payment_method">
                        <option selected>Select Payment Method</option>
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                        <option value="online">Online</option>
                    </select>


                </div>
                <label for="amountpaid" class="form-label">Amount Paid</label>
                <input type="text" class="form-control form-control-sm" name="amount_paid"
                    id="amount_paid"
                    aria-describedby="helpId"
                    placeholder="Enter Paid Amount" />


                <hr>

                <button onclick="checkout()" class="btn btn-success w-100 mt-3">
                    Checkout
                </button>

            </div>

        </div>

    </div>

</div>

@endsection
<script>
    let cart = [];

    const TAX = 0.05;

    // ================= ADD TO CART =================
    function addToCart(el) {
        let id = el.parentElement.dataset.id;
        let name = el.parentElement.dataset.name;
        let price = parseFloat(el.parentElement.dataset.price);

        let item = cart.find(p => p.id == id);

        if (item) {
            item.quantity++;
        } else {
            cart.push({
                id: id,
                name: name,
                price: price,
                quantity: 1
            });
        }
        renderCart();

    }

    // ================= RENDER CART =================
    function renderCart() {
        let table = document.getElementById("cartTable");
        table.innerHTML = "";

        let subtotal = 0;

        cart.forEach((item, index) => {

            let total = item.quantity * item.price;
            subtotal += total;

            table.innerHTML += `
        <tr>
            <td>${item.name}</td>

            <td>
                <button onclick="dec(${index})">-</button>
                ${item.quantity}
                <button onclick="inc(${index})">+</button>
            </td>

            <td>${item.price}</td>

            <td>
                <button onclick="removeItem(${index})">x</button>
            </td>
        </tr>`;
        });

        let discountInput = parseFloat(document.getElementById("discountInput").value) || 0;
        let discount = (subtotal * discountInput) / 100;

        // prevent negative total
        if (discount > subtotal) discount = subtotal;

        let grandTotal = subtotal - discount;

        document.getElementById("subtotal").innerText = subtotal.toFixed(2);
        document.getElementById("total").innerText = grandTotal.toFixed(2);
    }

    // ================= QTY =================
    function inc(i) {
        cart[i].quantity++;
        renderCart();
    }

    function dec(i) {
        if (cart[i].quantity > 1) {
            cart[i].quantity--;
        } else {
            cart.splice(i, 1);
        }

        renderCart();
    }

    function removeItem(i) {
        cart.splice(i, 1);
        renderCart();
    }

    // ================= UNIFIED FILTER (SEARCH & CATEGORY) =================
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const categoryFilter = document.getElementById("categoryFilter");

        // Unified filter function
        function filterProducts() {
            let searchVal = searchInput.value.trim().toLowerCase();
            let selectedCat = categoryFilter.value;

            document.querySelectorAll(".product-item").forEach(el => {
                // Read name directly from the attribute to guarantee a clean string comparison
                let name = (el.getAttribute("data-name") || "").trim().toLowerCase();
                let itemCat = el.getAttribute("data-category");

                // Evaluate filter conditions
                let matchesSearch = name.includes(searchVal);
                let matchesCategory = (selectedCat === "all" || itemCat == selectedCat);

                // FIX: Use ' d-none' class only.
                // Avoid adding 'd-block' so Bootstrap keeps its natural responsive grid flex style.
                if (matchesSearch && matchesCategory) {
                    el.classList.remove("d-none");
                } else {
                    el.classList.add("d-none");
                }
            });
        }

        // Attach listeners safely
        if (searchInput) searchInput.addEventListener("input", filterProducts);
        if (categoryFilter) categoryFilter.addEventListener("change", filterProducts);
    });

    function checkout() {
        if (cart.length === 0) {
            alert('Cart is Empty');
            return
        }
        let data = {
            customerId: document.getElementById('customer_id').value,
            subtotal: document.getElementById('subtotal').innerText,
            discount: document.getElementById('discountInput').value || 0,
            total: document.getElementById('total').innerText,
            payment_method: document.getElementById('payment_method').value,
            amount_paid: document.getElementById('amount_paid').value || 0,
            cart: cart,
        }
        fetch('/sales/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', //Fixed space
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data),
        }).then(res => res.json()).then(res => {
            if (res.success) {
                window.location.href = '/invoice/' + res.sale_id;
            } else {
                alert(res.message);
            }
        }).catch(error => {
            console.error('Fetch error:', error);
            alert('An error occurred during checkout. Check the console for details.');
        });
    }
    document.addEventListener("DOMContentLoaded", function () {

    const discountElement = document.getElementById('discountInput');

    if (discountElement) {
        discountElement.addEventListener("input", function () {
            console.log('DiscountChanged:',this.value);
            renderCart();
        });
    }

});
</script>