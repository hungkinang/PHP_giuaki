<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa đơn hàng #{{ $order->id }}</title>
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
    @include('layouts.header')

<div class="container mt-5">
    <h4 class="mb-4 fw-bold">Chỉnh sửa đơn hàng #{{ $order->id }}</h4>

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

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái <span class="text-danger">*</span></label>
            <select name="status" id="status" class="form-select" required>
                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang giao</option>
                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Hoàn tất</option>
                <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đã hủy</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Phương thức giao hàng<span class="text-danger">*</span></label>
            <select name="deliveryMethod" class="form-select">
                <option value="1" {{ $order->deliveryMethod == 1 ? 'selected' : '' }}>Giao nhanh</option>
                <option value="2" {{ $order->deliveryMethod == 2 ? 'selected' : '' }}>Nhận tại cửa hàng</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.orders.index', $order->id) }}" class="btn btn-danger">Hủy</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
