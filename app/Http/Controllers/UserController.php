<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Helpers\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UserController extends ProtectedController
{
    use ResponseTrait;

    public function index(Request $request)
    {
        $data = $request->all();
        $users = User::query();

        if (!empty($data['name'])) {
            $users = $users->where('name','like', '%' . $data['name'] . '%');
        }

        if (!empty($data['email'])) {
            $users = $users->where('email','like', '%' . $data['email'] . '%');
        }
        $users = $users->paginate(Constant::DEFAULT_PER_PAGE);

        return view('elements.user.index', compact('users'));
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->only([
            'staff_code',
            'name',
            'email',
            'password',
        ]);
        if ($request->boolean('role'))
        {
            $data['role'] = 1;
        } else {
            $data['role'] = 0;
        }

        $user = User::query()->create($data);

        return $this->success('Thêm người dùng thành công', $user);
    }

    public function edit(int $id)
    {
        $user = User::find($id);

        return $this->success('hHiển thị dùng thành công', $user);
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);

        $data = $request->only([
            'staff_code',
            'name',
        ]);
        if ($request->boolean('role'))
        {
            $data['role'] = 1;
        } else {
            $data['role'] = 0;
        }

        $user->update($data);

        return $this->success('Chỉnh sửa thành công', $user);
    }

    public function destroy(int $id)
    {
        $user = User::query()->findOrFail($id);
        $user->delete();

        return $this->success('Xóa thành công', $user);
    }

    public function changePassword(UserChangePasswordRequest $request, int $id)
    {
        $password = $request->input('password');
        $user = User::query()->findOrFail($id);
        $user->update(['password' => $password]);

        return $this->success('Thay dổi mật khẩu thành công', $user);
    }
}
