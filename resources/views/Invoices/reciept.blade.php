<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>

     /* body{
    background-color: #26272d8f;
    } */
    .reciept{
    background-color: #bebebec4;
    }
    #receipt{
    width:80mm;

    margin:auto;
    margin-top:3rem;
    /* margin-bottom:20px; */

    font-family:monospace;

    font-size:12px;

    /* padding-left: 5px; */
    padding-right: 20px;
    padding-top: 5px;
    padding-bottom: 5px;
    color:#000;
    }

    table{

    width:100%;

    border-collapse:collapse;

    }

    td,th{

    padding:3px 0;

    }

    .text-end{

    text-align:right;

    }

    .meta-table td:first-child{

    width:35%;

    }

    .items-table th{

    border-bottom:1px dashed #000;

    }

    .grand-total{

    border-top:1px dashed #000;

    border-bottom:1px dashed #000;

    font-weight:bold;

    }

    hr{

    border:none;

    border-top:1px dashed #000;

    margin:6px 0;

    }

    .no-print{

    margin-bottom:20px;

    }

    @media print{

    .navbar,
    .sidebar,
    footer,
    .no-print{

        display:none !important;

    }

    @page{

        size:80mm auto;

        margin:0;

    }

    html,
    body{

        margin:0;

        padding:0;

        background:#fff;

    }

    #receipt{

        width:72mm;

        margin:auto;

    }

    }
</style>
</head>
<body>

<div id="receipt" class="reciept">

    <div class="container">

        <div class="text-end mb-3 no-print">
            <button class="btn btn-success btn-sm" onclick="window.print()">
                Print Receipt
            </button>
        </div>
        <div id="receipt">

        <!-- Store Information -->
        <div class="text-center">
            <svg width="24" height="24" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                            <path d="M9 9h6v6H9zM9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 15h3M1 9h3M1 15h3"></path>
                        </svg> 

            <h4 class="mb-1">SMART POS STORE</h4>

            <div>Garhi Kapura</div>

            <div>Phone: +92 XXX XXXXXXX</div>

            <div>Email: store@email.com</div>
        </div>

        <hr>

        <!-- Invoice Information -->

        <table class="meta-table">

            <tr>
                <td>Invoice</td>
                <td>{{ $sale->invoice_no }}</td>
            </tr>

            <tr>
                <td>Date</td>
                <td>{{ $sale->created_at->format('d-m-Y h:i A') }}</td>
            </tr>

            <tr>
                <td>Cashier</td>
                <td>{{ $sale->user->name ?? '-' }}</td>
            </tr>

            <tr>
                <td>Customer</td>
                <td>{{ $sale->customer->name ?? 'Walk-in Customer' }}</td>
            </tr>

        </table>

        <hr>

        <!-- Products -->

        <table class="items-table">

            <thead>

            <tr>

                <th>Item</th>

                <th class="text-end">Total</th>

            </tr>

            </thead>

            <tbody>

            @foreach($sale->items as $item)

                <tr>

                    <td>

                        <strong>{{ $item->product->product_name }}</strong>

                        <br>

                        {{ number_format($item->sellingprice,2) }}

                        ×

                        {{ $item->quantity }}

                    </td>

                    <td class="text-end">

                        {{ number_format($item->subtotal,2) }}

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        <hr>

        <!-- Totals -->

        <table class="totals-table">

            <tr>
                <td>Total Items</td>
                <td class="text-end">
                    {{ $sale->items->sum('quantity') }}
                </td>
            </tr>

            <tr>
                <td>Subtotal</td>
                <td class="text-end">
                    Rs {{ number_format($sale->subtotal,2) }}
                </td>
            </tr>

            @if($sale->discount>0)

            <tr>
                <td>Discount</td>
                <td class="text-end">
                    {{ $sale->discount }}%
                </td>
            </tr>

            @endif

            <tr class="grand-total">

                <td>Grand Total</td>

                <td class="text-end">

                    Rs {{ number_format($sale->grandtotal,2) }}

                </td>

            </tr>

            <tr>

                <td>Paid</td>

                <td class="text-end">

                    Rs {{ number_format($sale->amountpaid,2) }}

                </td>

            </tr>

            <tr>

                <td>Change</td>

                <td class="text-end">

                    Rs {{ number_format($sale->amountpaid-$sale->grandtotal,2) }}

                </td>

            </tr>

            <tr>

                <td>Payment</td>

                <td class="text-end">

                    {{ ucfirst($sale->paymentmethod) }}

                </td>

            </tr>

        </table>

        <hr>

        <div class="text-center">

            <p>Thank You For Shopping</p>

            <p>This is computer generated reciept</p>

        </div>

    </div>

</div>

</div>

<script>
window.onload = function () {
    window.print();
};
</script>

</body>
</html>