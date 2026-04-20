<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(37, 99, 235, .3) 0%, transparent 70%);
            top: -100px;
            left: -100px;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(99, 102, 241, .2) 0%, transparent 70%);
            bottom: -80px;
            right: -80px;
            pointer-events: none;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 20px;
            padding: 40px 36px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-icon {
            width: 56px;
            height: 56px;
            background: #2563eb;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #fff;
            margin: 0 auto 16px;
        }

        .login-header h4 {
            color: #f1f5f9;
            font-size: 20px;
            font-weight: 800;
            margin: 0 0 6px;
        }

        .login-header p {
            color: #64748b;
            font-size: 13px;
            margin: 0;
        }

        .form-label {
            font-size: 12.5px;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: .3px;
            margin-bottom: 7px;
        }

        .form-control {
            background: #0f172a;
            border: 1.5px solid #334155;
            border-radius: 10px;
            color: #f1f5f9;
            font-size: 14px;
            padding: 11px 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .form-control:focus {
            background: #0f172a;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .2);
            color: #f1f5f9;
        }

        .form-control::placeholder {
            color: #475569;
        }

        .input-group-text {
            background: #0f172a;
            border: 1.5px solid #334155;
            border-right: none;
            color: #475569;
            border-radius: 10px 0 0 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .input-group:focus-within .input-group-text {
            border-color: #2563eb;
        }

        .btn-login {
            background: #2563eb;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            padding: 13px;
            width: 100%;
            transition: all .2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .btn-login:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .form-check-label {
            color: #64748b;
            font-size: 13px;
        }

        .form-check-input:checked {
            background-color: #2563eb;
            border-color: #2563eb;
        }

        .alert {
            border-radius: 10px;
            font-size: 13px;
            border: none;
        }

        .alert-danger {
            background: rgba(239, 68, 68, .15);
            color: #fca5a5;
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="login-icon"><i class="bi bi-shield-lock"></i></div>
                <h4>Admin Login</h4>
                <p>Enter your credentials to continue</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger mb-3">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">EMAIL ADDRESS</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="admin@example.com"
                            value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">PASSWORD</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="bi bi-arrow-right-circle me-2"></i>Sign In
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>