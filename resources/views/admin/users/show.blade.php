<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.transparenttextures.com/patterns/old-wall.png');
            background-color: #f7f3e9;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: 500;
        }
        .btn {
            min-width: 90px;
        }
    </style>
</head>
<body>
    {{-- Gọi header --}}
    @include('layouts.header')

    <div class="container mt-5">
        <h4 class="mb-4 fw-bold text-center">Chi tiết người dùng</h4>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" value="{{ $user->username }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="text" class="form-control" value="{{ $user->password }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Họ và tên</label>
                <input type="text" class="form-control" value="{{ $user->fullname }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" value="{{ $user->phoneNumber }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Giới tính</label>
                <input type="text" class="form-control" value="{{ $user->gender ? 'Nam' : 'Nữ' }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" value="{{ $user->address }}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Quyền</label>
                <input type="text" class="form-control" value="{{ $user->role }}" readonly>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success">Sửa</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
