<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Header --}}
    @include('layouts.header')

    <div class="container mt-4">
        <h3 class="fw-bold mb-4">📊 Thống kê tổng quan</h3>

        {{-- Các ô thống kê --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5>👤 Người dùng</h5>
                    <h3 class="fw-bold text-primary">{{ $totalUsers ?? 0 }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5>📦 Sản phẩm</h5>
                    <h3 class="fw-bold text-success">{{ $totalProducts ?? 0 }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5>🏷️ Thể loại</h5>
                    <h3 class="fw-bold text-info">{{ $totalCategories ?? 0 }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5>🧾 Đơn hàng</h5>
                    <h3 class="fw-bold text-warning">{{ $totalOrders ?? 0 }}</h3>
                </div>
            </div>
        </div>

        {{-- Doanh thu --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h5 class="fw-bold mb-2">💰 Tổng doanh thu</h5>
                <h3 class="text-success fw-bold">
                    {{ isset($totalRevenue) ? number_format((float)$totalRevenue, 0, ',', '.') . ' ₫' : '0 ₫' }}
                </h3>
            </div>
        </div>

        {{-- Đơn hàng gần đây --}}
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h5 class="fw-bold mb-3">🕒 Đơn hàng gần đây</h5>
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Tổng giao</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($latestOrders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ optional($order->user)->name ?? 'N/A' }}</td>
                                <td>
                                    {{ $order->formatted_delivery_price ?? 'N/A' }} ₫
                                </td>
                                <td>
                                    <span class="badge 
                                        {{ $order->status == 1 ? 'bg-success' : 
                                           ($order->status == 0 ? 'bg-warning' : 'bg-secondary') }}">
                                        {{ $order->status_text }}
                                    </span>
                                </td>
                                <td>{{ $order->formatted_created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Không có đơn hàng nào gần đây.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
