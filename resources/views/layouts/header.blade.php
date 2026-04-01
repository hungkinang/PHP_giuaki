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
            <a href="/" target="_blank" class="text-decoration-none text-dark me-3 d-flex align-items-center">
                <i class="bi bi-window me-1"></i> Client
            </a>
            <span class="me-2">Xin chào <strong>T3H ADMIN!</strong></span>
            <a href="{{ route('admin.logout') }}" class="btn btn-light btn-sm border">Đăng xuất</a>
        </div>
    </div>
</nav>

{{-- Thanh menu ngang --}}
<div class="bg-white py-2 ps-4 border-bottom d-flex align-items-center">
    <a href="{{ route('admin.dashboard') }}" class="me-4 text-decoration-none {{ request()->is('admin/dashboard') ? 'fw-bold text-primary' : 'text-secondary' }}">
         Dashboard
    </a>
    <a href="{{ route('admin.users.index') }}" class="me-4 text-decoration-none {{ request()->is('admin/users*') ? 'fw-bold text-primary' : 'text-secondary' }}">
         Quản lý người dùng
    </a>
    <a href="{{ route('admin.categories.index') }}" class="me-4 text-decoration-none {{ request()->is('admin/categories*') ? 'fw-bold text-primary' : 'text-secondary' }}">
         Quản lý thể loại
    </a>
    <a href="{{ route('admin.products.index') }}" class="me-4 text-decoration-none {{ request()->is('admin/products*') ? 'fw-bold text-primary' : 'text-secondary' }}">
         Quản lý sản phẩm
    </a>
    <a href="{{ route('admin.orders.index') }}" class="text-decoration-none {{ request()->is('admin/orders*') ? 'fw-bold text-primary' : 'text-secondary' }}">
         Quản lý đơn hàng
    </a>
</div>
