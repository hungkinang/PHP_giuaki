<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLogin()
    {
        return view('admin.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lấy user theo username
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->withErrors(['username' => 'Tên đăng nhập không tồn tại.']);
        }

        // Phân quyền: chỉ admin/employee mới được đăng nhập
        if (!in_array(strtolower($user->role), ['admin', 'employee'])) {
            return back()->withErrors(['username' => 'Bạn không có quyền truy cập.']);
        }

        // So sánh mật khẩu thẳng (không hash)
        if ($user->password !== $request->password) {
            return back()->withErrors(['username' => 'Mật khẩu không đúng.']);
        }

        // Đăng nhập thành công
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công!');
    }
}
