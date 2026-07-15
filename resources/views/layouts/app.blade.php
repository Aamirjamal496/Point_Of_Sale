<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Smart POS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastify CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @if(session('success'))
    <script>
        $(document).ready(function() {
            Toastify({
                text: "{{session('success')}}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        $(document).ready(function() {
            Toastify({
                text: "{{session('error')}}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        });
    </script>
    @endif

    <style>
        body {
            background: #f5f7fb;
            font-size: 14px;
            overflow-x: hidden;
        }

        /* .sidebar {
            width: 250px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            color: white;
            border-radius: 20px;
        } */
        .sidebar {
            width: 250px;
            min-height: 86vh;
            /* background: #394c6a; */
            background: #1e293b;
            position: fixed;
            left: 5px;
            top: 50px;
            /* bottom: 12rem; */
            color: white;
            border-radius: 20px;
        }

        .sidebar-brand {
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: .2s;
        }

        .sidebar a:hover {
            background: #334155;
            color: #fff;
        }

        .content {
            margin-left: 250px;
        }

        .topbar {
            background: white;
            height: 65px;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 20px;
        }

        .card-soft {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }

        .stat-card {
            padding: 18px;
        }

        .table {
            font-size: 14px;
        }

        @media(max-width:768px) {

            .sidebar {
                border-radius: 20px;
                left: -250px;
                z-index: 999;
            }

            .sidebar.show {
                left: 0;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar" id="sidebar">

        <div class="sidebar-brand">
            Smart POS
        </div>

        <a href="/dashboard">
            <i class="bi bi-grid me-2"></i>
            Dashboard
        </a>

        <a href="/products">
            <i class="bi bi-box-seam me-2"></i>
            Products
        </a>

        <a href="/categories">
            <i class="bi bi-tags me-2"></i>
            Categories
        </a>
        <a href="/inventory">
            <i class="bi bi-boxes me-2"></i>
            Inventories
        </a>

        <a href="/suppliers">
            <i class="bi bi-truck me-2"></i>
            Suppliers
        </a>

        <a href="/purchases">
            <i class="bi bi-cart-check me-2"></i>
            Purchases
        </a>

        <a href="/customers">
            <i class="bi bi-people me-2"></i>
            Customers
        </a>

        <a href="/sales">
            <i class="bi bi-shop me-2"></i>
            POS Sales
        </a>

        <a href="/invoices">
            <i class="bi bi-receipt me-2"></i>
            Invoices
        </a>

        <a href="/reports">
            <i class="bi bi-graph-up me-2"></i>
            Reports
        </a>

    </div>

    <div class="content">

        <div class="topbar d-flex justify-content-between align-items-center">

            <button class="btn btn-sm btn-outline-secondary d-md-none"
                onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>

            <h6 class="mb-0">@yield('title')</h6>

            <div>
                <form action="/logout" method="POST" class="inline">
                    <i class="bi bi-bell me-3"></i>
                    <i class="bi bi-person-circle"></i>
                    @csrf
                    <button type="submit" class="p-1 rounded-sm hover:bg-red-600/50 transition-all duration-200">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>

        </div>

        <div class="p-4">
            @yield('content')
        </div>

    </div>

    
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>