<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm - T3H Shop</title>
    {{-- Thêm Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Header chung --}}
    @include('layouts.header')

    <div class="container mt-4">
        <h4 class="fw-bold mb-3"> Thêm sản phẩm</h4>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
              class="bg-white p-4 border rounded shadow-sm">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tên sản phẩm *</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Thể loại *</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Chọn thể loại --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Giá gốc *</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Khuyến mãi (%)</label>
                    <input type="number" step="0.01" name="discount" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Số lượng *</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tác giả</label>
                    <input type="text" name="author" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Mô tả</label>
                    <textarea name="description" rows="4" class="form-control"></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Hình ảnh</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-success me-2">
                         Lưu sản phẩm
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        ← Quay lại
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
