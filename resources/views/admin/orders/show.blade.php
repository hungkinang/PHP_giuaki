<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng #{{ $order->id }}</title>
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
        table th, table td { vertical-align: middle; }
    </style>
</head>
<body>
    @include('layouts.header')

<div class="container mt-5">
    <h4 class="mb-4 fw-bold">Chi tiết đơn hàng #{{ $order->id }}</h4>

    <p><strong>Khách hàng:</strong> {{ $order->user->fullname ?? 'Không có' }}</p>
    <p><strong>Trạng thái:</strong>
        @if ($order->status == 0)
            <span class="badge bg-warning text-dark">Chờ xử lý</span>
        @elseif ($order->status == 1)
            <span class="badge bg-info text-dark">Đang giao</span>
        @elseif ($order->status == 2)
            <span class="badge bg-success">Hoàn tất</span>
        @else
            <span class="badge bg-danger">Đã hủy</span>
        @endif
    </p>
    <p><strong>Phương thức giao hàng:</strong> {{ $order->deliveryMethod ?? '-' }}</p>
    <p><strong>Phí giao hàng:</strong> {{ number_format($order->deliveryPrice ?? 0, 0, ',', '.') }}₫</p>
    <p><strong>Ngày tạo:</strong> {{ $order->created_at }}</p>

    <h5 class="mt-4">Sản phẩm</h5>
    <table class="table table-bordered table-hover mt-2 text-center">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-start">{{ $item->product->name ?? '-' }}</td>
                <td>{{ number_format($item->price ?? 0) }}</td>
                <td>{{ $item->discount ?? 0 }}%</td>
                <td>{{ $item->quantity ?? 0 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex gap-2 mt-3">
        <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-success">Chỉnh sửa</a>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-danger">Quay lại</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
