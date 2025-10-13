<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật người dùng</title>
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
        label { font-weight: 500; }
        .btn { min-width: 90px; }
    </style>
</head>
<body>
    {{-- Gọi header --}}
    @include('layouts.header')

<div class="container mt-5">
    <h4 class="mb-4 fw-bold">Cập nhật người dùng</h4>

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

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập<span style="color: red">*</span></label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu<span style="color: red">*</span></label>
            <input type="text" class="form-control" id="password" name="password" value="{{ $user->password }}" required>
        </div>

        <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên<span style="color: red">*</span></label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->fullname }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email<span style="color: red">*</span></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Số điện thoại<span style="color: red">*</span></label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $user->phoneNumber }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giới tính<span style="color: red">*</span></label><br>
            <input type="radio" id="nam" name="gender" value="1" {{ $user->gender ? 'checked' : '' }}>
            <label for="nam">Nam</label>
            <input type="radio" id="nu" name="gender" value="0" {{ !$user->gender ? 'checked' : '' }}>
            <label for="nu">Nữ</label>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ<span style="color: red">*</span></label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Quyền<span style="color: red">*</span></label>
            <select id="role" name="role" class="form-select" required>
                <option value="ADMIN" {{ $user->role == 'ADMIN' ? 'selected' : '' }}>ADMIN</option>
                <option value="EMPLOYEE" {{ $user->role == 'EMPLOYEE' ? 'selected' : '' }}>EMPLOYEE</option>
                <option value="CUSTOMER" {{ $user->role == 'CUSTOMER' ? 'selected' : '' }}>CUSTOMER</option>
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Hủy</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
