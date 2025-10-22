<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Kiểm tra người dùng và phân quyền (Admin hoặc Employee)
        $user = \App\Models\User::where('username', $request->username)->first();
        if ($user && $user->password === $request->password) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('admin.users.index');
        }


        return back()->withErrors(['username' => 'Sai tài khoản hoặc mật khẩu!']);
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
