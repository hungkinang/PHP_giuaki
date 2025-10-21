<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T3H Shop - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-size: 15px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>

    {{-- Gọi header --}}
    @include('layouts.header')

    {{-- Nội dung riêng --}}
    <div class="container-fluid mt-3">
        <div class="bg-white p-3 border rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Quản lý sản phẩm</h5>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Thêm sản phẩm
                </a>
            </div>

            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá gốc</th>
                        <th>Khuyến mãi</th>
                        <th>Giá bán</th>
                        <th>Tồn kho</th>
                        <th>Lượt mua</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>
                                <img src="{{ asset('uploads/products/' . $p->image) }}" 
                                     alt="img" width="40" height="50" class="rounded">
                            </td>
                            <td class="text-primary text-start">
                                <a href="#" class="text-decoration-none text-primary">{{ $p->name }}</a>
                            </td>
                            <td>{{ number_format($p->price, 0, ',', '.') }}₫</td>
                            <td>{{ $p->discount }}%</td>
                            <td>{{ number_format($p->price * (1 - $p->discount/100), 0, ',', '.') }}₫</td>
                            <td>{{ $p->quantity }}</td>
                            <td>{{ $p->totalBuy }}</td>
                            <td class="d-flex justify-content-evenly">
                                <a href="{{ route('admin.products.show', $p->id) }}" class="btn btn-sm btn-primary">Xem</a>
                                <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-sm btn-success">Sửa</a>
                                <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Xóa sản phẩm này?');">
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
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<style>
.small.text-muted { display: none !important; }
</style>

</html>
