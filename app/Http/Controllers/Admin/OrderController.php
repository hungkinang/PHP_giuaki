<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Orders::with(['user'])->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Orders::with('user', 'items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required|exists:user,id',
            'status' => 'required|string|max:255',
            'deliveryMethod' => 'required|string|max:255',
            'deliveryPrice' => 'required|numeric',
        ]);

        Orders::create([
            'userId' => $request->userId,
            'status' => $request->status,
            'deliveryMethod' => $request->deliveryMethod,
            'deliveryPrice' => $request->deliveryPrice,
            'createdAt' => now(),
            'updatedAt' => now(),
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Tạo đơn hàng mới thành công!');
    }

    public function edit($id)
    {
        $order = Orders::with('user', 'items.product')->findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Xóa đơn hàng thành công!');
    }
}
