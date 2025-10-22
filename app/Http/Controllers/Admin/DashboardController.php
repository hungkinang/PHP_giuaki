<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ✅ Tính tổng doanh thu: chỉ tính các đơn đã hoàn thành (status = 3)
        $totalRevenue = Orders::where('status', 3)->sum('deliveryPrice');

        // ✅ Tổng số đơn hàng
        $totalOrders = Orders::count();

        // ✅ Tổng số khách hàng
        $totalUsers = User::count();

        // ✅ Tổng số sản phẩm
        $totalProducts = Product::count();

        // ✅ Lấy 5 đơn hàng mới nhất
        $latestOrders = Orders::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // ✅ Xử lý format hiển thị ngày + giá tiền
        foreach ($latestOrders as $order) {
            // Format ngày tạo
            $order->formatted_created_at = $order->created_at
                ? Carbon::parse($order->created_at)->format('d/m/Y H:i')
                : 'Không xác định';

            // Format giá tiền
            $order->formatted_delivery_price = $order->deliveryPrice !== null
                ? number_format((float)$order->deliveryPrice, 0, ',', '.')
                : '0';

            // Gán text trạng thái để view hiển thị dễ hiểu
            $order->status_text = match ($order->status) {
                1 => 'Mới tạo',
                2 => 'Đang xử lý',
                3 => 'Hoàn thành',
                default => 'Không rõ',
            };
        }

        // ✅ Trả dữ liệu ra view
        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalUsers',
            'totalProducts',
            'latestOrders'
        ));
    }
}
