<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T3H Shop - Quản lý thể loại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-size: 15px; }
        .table th, .table td { vertical-align: middle; }
        img.category-img {
            width: 45px; height: 45px; object-fit: cover; border-radius: 6px;
        }
    </style>
</head>
<body>

@include('layouts.header')

<div class="container-fluid mt-3">
    <div class="bg-white p-3 border rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Quản lý thể loại</h5>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">+ Thêm thể loại</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Hình</th>
                    <th>Tên thể loại</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->id }}</td>
                        <td>
                            @if ($category->imageName)
                                <img src="{{ asset('storage/' . $category->imageName) }}" class="category-img" alt="Hình thể loại">
                            @else
                                <span class="text-muted">Không có ảnh</span>
                            @endif
                        </td>
                        <td class="text-primary text-start">{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="d-flex justify-content-evenly">
                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-sm btn-primary">Xem</a>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-success">Sửa</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted py-4">Không có dữ liệu để hiển thị</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>.small.text-muted { display: none !important; }</style>
</body>
</html>
