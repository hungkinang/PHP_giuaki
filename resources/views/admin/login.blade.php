<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            width: 350px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .login-header {
            background-color: #007bff;
            color: white;
            padding: 12px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <div class="login-header">Shop Bán Sách</div>
    <h5 class="mt-3 text-center">Đăng nhập Admin</h5>
    <p class="text-center text-muted small">Chỉ dành cho quản trị viên và nhân viên</p>

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
</div>

</body>
</html>
