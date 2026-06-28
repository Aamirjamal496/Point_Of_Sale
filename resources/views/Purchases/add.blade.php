@extends('layouts.app')

@section('title','Create Purchase')

@section('content')

<form action="/purchases/create" method="post">
    @csrf

    <div class="row">

        <div class="col-lg-12">

            <!-- PURCHASE INFO -->
            <div class="card card-soft mb-3">

                <div class="card-header bg-white">
                    <h6 class="mb-0">Purchase Information</h6>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label>Supplier</label>
                            <select class="form-select" name="supplier_id">
                                <option>Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Purchase Date</label>
                            <input type="date" class="form-control" name="purchase_date" />
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Reference No</label>
                            <input type="text" class="form-control" placeholder="PUR-1001" />
                        </div>

                    </div>

                </div>

            </div>

            <!-- ITEMS -->
            <div class="card card-soft mb-3">

                <div class="card-header bg-white d-flex justify-content-between align-items-center">

                    <h6 class="mb-0">Purchase Items</h6>

                    <button type="button" id="addRow" class="btn btn-success btn-sm">
                        + Add Item
                    </button>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th width="120">Qty</th>
                                    <th width="150">Cost</th>
                                    <th width="150">Subtotal</th>
                                    <th width="80">Action</th>
                                </tr>
                            </thead>

                            <tbody id="purchaseBody">

                                <!-- DEFAULT ROW -->
                                <tr>

                                    <td>
                                        <select class="form-select product" name="product_id[]">
                                            <option value="">Select Product</option>
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <input type="number" class="form-control qty" value="1" min="1" name="quantity[]" />
                                    </td>

                                    <td>
                                        <input type="number" class="form-control cost" value="0" min="0" name="cost[]" />
                                    </td>

                                    <td>
                                        <input type="text" class="form-control subtotal" value="0.00" readonly />
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm removeRow">
                                            <i class="bi bi-box bi-sm"></i>
                                        </button>
                                    </td>

                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

            <!-- SUMMARY -->
            <div class="card card-soft">

                <div class="card-header bg-white">
                    <h6 class="mb-0">Summary</h6>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-3 mb-2">
                            <label>Subtotal</label>
                            <input type="text" id="subtotal" class="form-control" readonly value="0.00" />
                        </div>

                        <div class="col-md-3 mb-2">
                            <label>Discount</label>
                            <input type="number" id="discount" class="form-control" value="0" name="Discount" />
                        </div>

                        <div class="col-md-3 mb-2">
                            <label>Tax</label>
                            <input type="number" id="tax" class="form-control" value="0" name="tax" />
                        </div>

                        <div class="col-md-3 mb-2">
                            <label>Grand Total</label>
                            <input type="text" id="grandTotal" class="form-control" name="total" readonly value="0.00">
                        </div>

                    </div>

                    <div class="mt-3">
                        <label>Notes</label>
                        <textarea class="form-control" rows="3" name="notes"></textarea>
                    </div>

                    <div class="text-end mt-4">
                        <a href="/purchases" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Purchase</button>
                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

@endsection
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const tbody = document.getElementById("purchaseBody");
        const addBtn = document.getElementById("addRow");

        const subtotalField = document.getElementById("subtotal");
        const discountField = document.getElementById("discount");
        const taxField = document.getElementById("tax");
        const grandTotalField = document.getElementById("grandTotal");

        // -----------------------------
        // CALCULATE EVERYTHING
        // -----------------------------
        function calculateTotals() {

            let subtotal = 0;

            const rows = tbody.querySelectorAll("tr");

            rows.forEach(row => {

                const qty = parseFloat(row.querySelector(".qty").value) || 0;
                const cost = parseFloat(row.querySelector(".cost").value) || 0;

                const rowTotal = qty * cost;

                row.querySelector(".subtotal").value = rowTotal.toFixed(2);

                subtotal += rowTotal;
            });

            subtotalField.value = subtotal.toFixed(2);

            let discount = parseFloat(discountField.value) || 0;
            let tax = parseFloat(taxField.value) || 0;

            let grandTotal = subtotal - discount + tax;

            grandTotalField.value = grandTotal.toFixed(2);
        }

        // -----------------------------
        // ADD NEW ROW
        // -----------------------------
        addBtn.addEventListener("click", function() {

            const newRow = document.createElement("tr");

            newRow.innerHTML = `
            <td>
                <select class="form-select product" name='product_id[]'>
                    <option value="">Select Product</option>
                     @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                     @endforeach
                </select>
            </td>

            <td>
                <input type="number" class="form-control qty" value="1" min="1">
            </td>

            <td>
                <input type="number" class="form-control cost" value="0" min="0">
            </td>

            <td>
                <input type="text" class="form-control subtotal" value="0.00" readonly>
            </td>

            <td>
                <button type="button" class="btn btn-danger btn-sm removeRow">X</button>
            </td>
        `;

            tbody.appendChild(newRow);

            calculateTotals();
        });

        // -----------------------------
        // REMOVE ROW (EVENT DELEGATION)
        // -----------------------------
        tbody.addEventListener("click", function(e) {

            if (e.target.classList.contains("removeRow")) {

                const rows = tbody.querySelectorAll("tr");

                if (rows.length === 1) {
                    alert("At least one product row is required.");
                    return;
                }

                e.target.closest("tr").remove();

                calculateTotals();
            }
        });

        // -----------------------------
        // LIVE INPUT CALCULATION
        // -----------------------------
        tbody.addEventListener("input", function(e) {

            if (
                e.target.classList.contains("qty") ||
                e.target.classList.contains("cost")
            ) {
                calculateTotals();
            }
        });

        // -----------------------------
        // DISCOUNT + TAX CHANGE
        // -----------------------------
        discountField.addEventListener("input", calculateTotals);
        taxField.addEventListener("input", calculateTotals);

        // -----------------------------
        // INITIAL CALCULATION
        // -----------------------------
        calculateTotals();

    });
</script>