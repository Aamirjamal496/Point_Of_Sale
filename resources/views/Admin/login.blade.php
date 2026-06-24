<!-- <div>
    <form action="/login" method="post">
        @csrf
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="abc@mail.com" />
            <input type="email" class="form-control" name="password" placeholder="Enter Your Password" />
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Login</button>
        </div>

    </form>

</div> -->
<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    background: "linear-gradient(to right, #0b3c5d, #328cc1)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        });
    </script>
    @endif

</head>

<body class="bg-light">

    <div class="container">

        <div class="row justify-content-center vh-100 align-items-center">

            <div class="col-md-4">

                <div class="card shadow-sm">

                    <form action="/login" method="post" class="card-body p-4">
                        @csrf
                        <h3 class="text-center mb-4">
                            Smart POS
                        </h3>

                        <input type="email"
                            name="email"
                            class="form-control mb-3"
                            placeholder="Enter Email" required>

                        <input type="password"
                            name="password"
                            class="form-control mb-3"
                            placeholder="Enter Password"
                            autocomplete="current-password" required>

                        <button class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>