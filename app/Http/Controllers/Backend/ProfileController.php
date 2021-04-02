<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileChangePasswordRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show form update profile
     *
     */
    public function index()
    {
        $user = auth()->user();

        return view('backend.elements.profile.index', compact('user'));
    }

    /**
     * Update user profile
     *
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'address',
            'phone_number',
            'birthday',
            'ma_can_bo',
            'chuc_vu',
            'hoc_vi',
        ]);

        $attachment = $request->file('file');
        $imageName = time() . $attachment->getClientOriginalName();
        $pathToFile = 'avatars/' . $imageName;
        Storage::put($pathToFile, fopen($attachment, 'r+'), 'public');
        $url = Storage::url($pathToFile);

        $data['avatar'] = $url;

        $user = User::query()->findOrFail(auth()->id());
        $user->update($data);

        return redirect()->back()->with('flash_success', __('labels.pages.backend.profile.messages.update_success'));
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

    /**
     * Change password
     *
     * @param ProfileChangePasswordRequest $request
     * @return RedirectResponse
     */
    public function changePassword(ProfileChangePasswordRequest $request): RedirectResponse
    {
        $oldPassword = $request->input('old_password');
        $user = User::query()->findOrFail(auth()->id());
        if (!Hash::check($oldPassword, $user->password)) {
            return redirect()->back()->withErrors([__('labels.pages.backend.profile.messages.wrong_old_password')]);
        }

        $data = $request->only(['password']);
        $user->update($data);

        return redirect()->back()->with('flash_success', __('labels.pages.backend.profile.messages.change_password_success'));
    }
}
