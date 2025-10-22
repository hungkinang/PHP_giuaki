<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        // Lấy toàn bộ thể loại từ DB
        $categories = Category::all();
    
        // Trả về view và truyền biến $categories sang
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('product/image', 'public');
            $data['imageName'] = basename($path);
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = \App\Models\Category::all(); // Lấy tất cả category từ DB
        return view('admin.products.edit', compact('product', 'categories'));
    }
    

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Xoá ảnh cũ
            if ($product->imageName && Storage::disk('public')->exists('product/image/' . $product->imageName)) {
                Storage::disk('public')->delete('product/image/' . $product->imageName);
            }
            // Lưu ảnh mới
            $path = $request->file('image')->store('product/image', 'public');
            $data['imageName'] = basename($path);
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
    
        // 🧹 1. Xoá tất cả các bản ghi liên quan trong các bảng phụ
        DB::table('product_category')->where('productId', $product->id)->delete();
        DB::table('product_review')->where('productId', $product->id)->delete();
        DB::table('order_item')->where('productId', $product->id)->delete();
        DB::table('cart_item')->where('productId', $product->id)->delete();
        DB::table('wishlist_item')->where('productId', $product->id)->delete();
    
        // 🖼️ 2. Xoá ảnh nếu có
        if ($product->imageName && Storage::disk('public')->exists('product/image/' . $product->imageName)) {
            Storage::disk('public')->delete('product/image/' . $product->imageName);
        }
    
        // 🗑️ 3. Cuối cùng mới xoá sản phẩm chính
        $product->delete();
    
        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công');
    }
    
    


    
}
