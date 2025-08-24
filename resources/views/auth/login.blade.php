<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - TamuRasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f6fa;
            /* abu cerah */
            color: #333;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            width: 380px;
            border-radius: 16px;
            background: #ffffff;
            /* putih */
            border: 1px solid #e0e0e0;
        }

        .btn-custom {
            background-color: #ff9800;
            border: none;
            color: white;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #e68900;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow-sm login-card">
        <h3 class="text-center mb-4">🔑 Login Admin</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">📧 Email</label>
                <input type="email" class="form-control" name="email" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">🔒 Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>
    </div>
</body>

</html>
