<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm - T3H Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    {{-- Gọi header --}}
    @include('layouts.header')

    <div class="container mt-4">
        <h4 class="fw-bold mb-3">✏️ Sửa sản phẩm</h4>

        {{-- Form sửa sản phẩm --}}
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 border rounded shadow-sm">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tên sản phẩm *</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Thể loại *</label>
                    <select name="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Giá gốc *</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Khuyến mãi (%)</label>
                    <input type="number" step="0.01" name="discount" value="{{ old('discount', $product->discount) }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tồn kho *</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Lượt mua</label>
                    <input type="number" name="totalBuy" value="{{ old('totalBuy', $product->totalBuy) }}" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Mô tả</label>
                    <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Hình ảnh</label><br>
                    @if ($product->image)
                        <img src="{{ asset('storage/product/image/' . $product->image) }}" alt="Hình hiện tại" width="100" class="rounded mb-2">
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-success me-2">
                         Lưu thay đổi
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        ← Quay lại
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
