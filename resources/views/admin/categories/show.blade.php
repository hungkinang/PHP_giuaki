<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết thể loại</title>
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
        .category-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    @include('layouts.header')

<div class="container mt-5">
    <h4 class="mb-4 fw-bold">Chi tiết thể loại</h4>

    <div class="mb-3">
        <label class="fw-bold">Tên thể loại:</label>
        <p>{{ $category->name }}</p>
    </div>

    <div class="mb-3">
        <label class="fw-bold">Mô tả:</label>
        <p>{{ $category->description ?? 'Không có mô tả' }}</p>
    </div>

    <div class="mb-3">
        <label class="fw-bold">Hình ảnh:</label><br>
        @if ($category->imageName)
            <img src="{{ asset('storage/' . $category->imageName) }}" alt="Ảnh thể loại" class="category-img">
        @else
            <p class="text-muted">Không có hình ảnh</p>
        @endif
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-success">Chỉnh sửa</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
