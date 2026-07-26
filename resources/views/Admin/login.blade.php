<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Smart POS</title>
    <style>
        /* Instant Rendering Engine - Pure Native Layout */
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: system-ui, -apple-system, sans-serif; }
        
        body {
            background-color: #0f172a; /* Match app layout background */
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 360px;
        }

        .login-card {
            background-color: #1e293b; /* Match sidebar and topbar background */
            border: 1px solid #334155; /* Match app panel border specs */
            border-radius: 20px; /* Match sidebar rounding curve */
            padding: 30px;
        }

        .text-center { text-align: center; }
        .mb-1 { margin-bottom: 4px; }
        .mb-3 { margin-bottom: 16px; }
        .mb-4 { margin-bottom: 24px; }
        .fw-bold { font-weight: 700; font-size: 24px; color: #ffffff; }
        .text-muted { color: #cbd5e1; font-size: 14px; opacity: 0.7; }

        /* Super Lightweight Native Badge */
        .terminal-badge {
            width: 48px;
            height: 48px;
            background-color: #312e81; /* Match app layout icon accent */
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Lightning Fast Native Input Fields matching layout form overrides */
        .form-group {
            margin-bottom: 16px;
            position: relative;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            background-color: #0f172a; /* Same inverted depth contrast */
            border: 1px solid #475569;
            border-radius: 10px;
            color: #f8fafc;
            font-size: 15px;
            outline: none;
        }
        
        .form-control::placeholder {
            color: #94a3b8;
        }
        
        .form-control:focus {
            border-color: #6366f1;
        }

        /* Instant Click Action Button */
        .btn-fast {
            width: 100%;
            padding: 12px;
            background-color: #4f46e5;
            border: none;
            border-radius: 10px;
            color: #ffffff;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
        }
        
        .btn-fast:hover {
            background-color: #4338ca;
        }

        /* High-Speed Native Notification Toast */
        .native-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 12px 20px;
            color: white;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            z-index: 9999;
        }
        .toast-success { background-color: #10b981; }
        .toast-error { background-color: #ef4444; }
    </style>
</head>

<body>

    <!-- Native Session Message Processing (Zero jQuery Dependency) -->
    @if(session('success'))
        <div class="native-toast toast-success" id="statusToast">{{ session('success') }}</div>
        <script>setTimeout(() => document.getElementById('statusToast')?.remove(), 3000);</script>
    @endif

    @if(session('error'))
        <div class="native-toast toast-error" id="statusToast">{{ session('error') }}</div>
        <script>setTimeout(() => document.getElementById('statusToast')?.remove(), 3000);</script>
    @endif

    <div class="login-container">
        <div class="login-card">
            <form action="/login" method="post">
                @csrf
                <div class="text-center mb-4">
                    <div class="terminal-badge mb-3">
                        <svg width="24" height="24" fill="none" stroke="#ffffff" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                            <path d="M9 9h6v6H9zM9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 15h3M1 9h3M1 15h3"></path>
                        </svg>
                    </div>
                    <h2 class="fw-bold mb-1">Smart POS</h2>
                    <p class="text-muted">Terminal Authorization Center</p>
                </div>

                <!-- Native Email Field -->
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
                </div>

                <!-- Native Password Field -->
                <div class="form-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Security Password" autocomplete="current-password" required>
                </div>

                <!-- Native Action Execution Button -->
                <button type="submit" class="btn-fast">
                    Initialize System
                </button>
            </form>
        </div>

        <!-- Minimal Footprint Legal Signature -->
        <div class="text-center" style="margin-top: 20px;">
            <p class="text-muted" style="opacity: 0.4; font-size: 12px;">&copy; {{ date('Y') }} AamirJamal's Smart POS Operational Unit.</p>
        </div>
    </div>

</body>
</html>
