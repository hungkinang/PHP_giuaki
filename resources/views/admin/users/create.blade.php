<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
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
    <h4 class="mb-4 fw-bold">Thêm người dùng</h4>

    {{-- Hiển thị lỗi validate --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
        </div>

        <div class="mb-3">
            <label class="required">Giới tính <span class="text-danger">*</span></label><br>
            <input type="radio" id="nam" name="gender" value="true" required>
            <label for="nam">Nam</label>
            <input type="radio" id="nu" name="gender" value="false">
            <label for="nu">Nữ</label>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Quyền <span class="text-danger">*</span></label>
            <select id="role" name="role" class="form-select" required>
                <option value="" disabled selected>Chọn một quyền...</option>
                <option value="ADMIN">ADMIN</option>
                <option value="EMPLOYEE">EMPLOYEE</option>
                <option value="CUSTOMER">CUSTOMER</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-warning text-white">Mặc định</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Hủy</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
