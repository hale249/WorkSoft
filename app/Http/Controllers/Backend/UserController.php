<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show list users
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
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

        return view('backend.elements.user.index', compact('users'));
    }

    /**
     * Show form create user
     *
     * @return View
     */
    public function create(): View
    {
        return view('backend.elements.user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
            'username',
        ]);
        User::query()
            ->create($data);

        return redirect()->back()->with('flash_success', __('labels.pages.backend.users.messages.create_user_success'));
    }

    /**
     * Show form edit user
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $user = User::query()->findOrFail($id);

        return view('backend.elements.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        $data = $request->only([
            'first_name',
            'last_name'
        ]);

        $user = User::query()->findOrFail($id);
        $user->update($data);

        return redirect()->back()->with('flash_success', __('labels.pages.backend.users.messages.update_user_success'));
    }

    public function destroy(int $id)
    {
        $user = User::query()->findOrFail($id);
        if ($user->id === 1) {
            return redirect()->back()->withErrors([__('labels.pages.backend.users.messages.can_not_delete_user')]);
        }

        $user->delete();

        return redirect()->back()->with('flash_success', __('labels.pages.backend.users.messages.delete_user_success'));
    }

    public function showFormChangePassword(int $id): View
    {
        $user = User::query()->findOrFail($id);

        return view('backend.elements.user.change_password', compact('user'));
    }

    public function changePassword(UserChangePasswordRequest $request, int $id)
    {
        $password = $request->input('password');
        $user = User::query()->findOrFail($id);
        $user->update(['password' => $password]);

        return redirect()->back()->with('flash_success', __('labels.pages.backend.users.messages.change_password_user_success'));
    }
}
