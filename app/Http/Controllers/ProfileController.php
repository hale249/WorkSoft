<?php

namespace App\Http\Controllers;


use App\Helpers\ResponseTrait;
use App\Http\Requests\ProfileChangePasswordRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends ProtectedController
{
    use ResponseTrait;
    /**
     * Show form update profile
     *
     */
    public function index()
    {
        $user = auth()->user();

        return view('elements.profile.index', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->only([
            'name',
            'address',
            'phone_number',
            'birthday',
            'ma_can_bo',
            'chuc_vu',
            'hoc_vi',
        ]);

        $user = User::query()->findOrFail(auth()->id());
        $userUpdate = $user->update($data);

        return $this->success('Cập nhật hồ sơ thành công', $userUpdate);
    }

    /**
     * Show form change password
     *
     */
    public function showFormChangePassword()
    {
        $user = auth()->user();

        return view('backend.elements.profile.change_password', compact('user'));
    }

    public function changePassword(ProfileChangePasswordRequest $request)
    {
        $oldPassword = $request->input('old_password');
        $user = User::query()->findOrFail(auth()->id());
        if (!Hash::check($oldPassword, $user->password)) {
            return redirect()->back()->withErrors([__('labels.pages.backend.profile.messages.wrong_old_password')]);
        }

        $data = $request->only(['password']);
        $userChange = $user->update($data);

        if (empty($userChange)) {
            return $this->error('Thay đổi password thất bại');
        }

        return $this->success('Thay đổi mật khẩu thành công');
    }
}
