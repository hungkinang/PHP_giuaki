{{-- Header chung cho toàn bộ trang Admin --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm px-4">
    <div class="container-fluid">
        {{-- Logo / Tên shop --}}
        <div class="d-flex align-items-center">
            <span class="badge bg-primary me-2">Admin</span>
            <h5 class="mb-0 fw-bold">T3H Shop</h5>
        </div>

        {{-- Góc phải: Client + thông tin Admin --}}
        <div class="d-flex align-items-center">
            <a href="#" class="text-decoration-none text-dark me-3 d-flex align-items-center">
                <i class="bi bi-window me-1"></i> Client
            </a>
            <span class="me-2">Xin chào <strong>T3H ADMIN!</strong></span>
            <a href="{{ route('admin.logout') }}" class="btn btn-light btn-sm border">Đăng xuất</a>
        </div>
    </div>
</nav>

{{-- Thanh menu ngang --}}
<div class="bg-white py-2 ps-4 border-bottom">
    <a href="/admin/users" class="text-secondary text-decoration-none me-4">
        👥 Quản lý người dùng
    </a>
    <a href="/admin/categories" class="text-secondary text-decoration-none me-4">
        🏷️ Quản lý thể loại
    </a>
    <a href="/admin/products" class="text-secondary text-decoration-none me-4">
        📚 Quản lý sản phẩm
    </a>
    <a href="/admin/orders" class="text-secondary text-decoration-none">
        🧾 Quản lý đơn hàng
    </a>
</div>
