<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm - {{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    {{-- Gọi header --}}
    @include('layouts.header')

    <div class="container mt-4">
        <h4 class="fw-bold mb-3"> Chi tiết sản phẩm</h4>

        <div class="card shadow-sm">
            <div class="row g-0">
                <div class="col-md-4 text-center p-3">
                    @if($product->image)
                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Ảnh sản phẩm" class="img-fluid rounded">
                    @elseif($product->imageName)
                        <img src="{{ asset('storage/' . $product->imageName) }}" alt="Ảnh sản phẩm" class="img-fluid rounded">
                    @else
                        <img src="https://via.placeholder.com/200x250?text=No+Image" class="img-fluid rounded" alt="No image">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title mb-2">{{ $product->name }}</h4>

                        <p><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} ₫</p>
                        <p><strong>Giảm giá:</strong> {{ $product->discount ?? 0 }}%</p>
                        <p><strong>Số lượng:</strong> {{ $product->quantity }}</p>
                        <p><strong>Lượt mua:</strong> {{ $product->totalBuy ?? 0 }}</p>

                        <p><strong>Thể loại:</strong>
                            @if(isset($product->categories) && $product->categories->count())
                                {{ $product->categories->pluck('name')->join(', ') }}
                            @else
                                <em>Chưa có</em>
                            @endif
                        </p>

                        <p><strong>Mô tả:</strong></p>
                        <p>{{ $product->description ?? 'Không có mô tả' }}</p>

                        <div class="mt-3">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning me-2">Sửa</a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Xóa</button>
                            </form>

                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
