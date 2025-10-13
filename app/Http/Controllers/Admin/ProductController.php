<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm, 15 sản phẩm mỗi trang
        $products = Product::paginate(15);

        // Trả dữ liệu ra view
        return view('admin.products.index', compact('products'));
    }
}
