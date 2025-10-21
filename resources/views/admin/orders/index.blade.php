<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T3H Shop - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-size: 15px; }
        .table th, .table td { vertical-align: middle; }
    </style>
</head>
<body>

    {{-- Header --}}
    @include('layouts.header')

    <div class="container-fluid mt-3">
        <div class="bg-white p-3 border rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Quản lý đơn hàng</h5>
            </div>

            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Người đặt</th>
                        <th>Phương thức giao hàng</th>
                        <th>Phí giao hàng</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td class="text-start">{{ $order->user->fullname ?? 'Không có' }}</td>
                            <td>
                                @switch($order->deliveryMethod)   
                                @case(1)
                                    Giao nhanh
                                    @break
                                @case(2)
                                    Nhận tại cửa hàng
                                    @break
                                @default
                                    -
                                @endswitch
                            </td>

                            <td>{{ number_format($order->deliveryPrice ?? 0, 0, ',', '.') }}₫</td>
                            <td>
                                @if ($order->status == 0)
                                    <span class="badge bg-warning text-dark">Chờ xử lý</span>
                                @elseif ($order->status == 1)
                                    <span class="badge bg-info text-dark">Đang giao</span>
                                @elseif ($order->status == 2)
                                    <span class="badge bg-success">Hoàn tất</span>
                                @else
                                    <span class="badge bg-danger">Đã hủy</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="d-flex justify-content-evenly">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">Xem</a>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-success">Sửa</a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<style>
.small.text-muted { display: none !important; }
</style>
</html>
