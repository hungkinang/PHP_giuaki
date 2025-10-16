<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(3);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    { 
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
    $data = $request->all();
    $data['gender'] = $request->gender === 'true' || $request->gender === '1' ? 1 : 0;

    User::create($data);

    return redirect()->route('admin.users.index')->with('success', 'Thêm người dùng thành công');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
    $user = User::findOrFail($id);

    $data = $request->all();

    $data['gender'] = $request->gender === 'true' || $request->gender === '1' ? 1 : 0;

    $user->update($data);

    return redirect()->route('admin.users.index')->with('success', 'Cập nhật thành công');
    }


    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'Xóa thành công');
    }
}
