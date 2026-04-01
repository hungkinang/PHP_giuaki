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
        $totalRevenue = Orders::where('status', 2)->sum('deliveryPrice');
        $totalOrders = Orders::count();
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();

        $latestOrders = Orders::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        foreach ($latestOrders as $order) {

            $order->formatted_created_at = $order->created_at
                ? Carbon::parse($order->created_at)->format('d/m/Y H:i')
                : 'Không xác định';

            $order->formatted_delivery_price = $order->deliveryPrice !== null
                ? number_format((float)$order->deliveryPrice, 0, ',', '.')
                : '0';

            $order->status_text = match ($order->status) {
                1 => 'Mới tạo',
                2 => 'Đang xử lý',
                3 => 'Hoàn thành',
                default => 'Không rõ',
            };
        }

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalUsers',
            'totalCategories',
            'totalProducts',
            'latestOrders'
        ));
    }
}
