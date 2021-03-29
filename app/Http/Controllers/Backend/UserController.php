<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $users = User::query()
            ->with('roles');

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
        $roles = Role::all();
        return view('backend.elements.user.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only([
                'first_name',
                'last_name',
                'email',
                'password',
            ]);
            $user = User::query()->create($data);
            if ($user) {
                $user->assignRole($request->role);
            }
            DB::commit();

            return redirect()->route('backend.users.index')->with('flash_success', __('labels.pages.backend.users.messages.create_user_success'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

        }
    }

    /**
     * Show form edit user
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $user = User::query()->where('id', $id)->with('roles')->first();
        $roles = Role::all();

        return view('backend.elements.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, int $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->only([
                'first_name',
                'last_name',
            ]);

            $user = User::query()
                ->findOrFail($id);

            $userUpdate = $user->update($data);

            $userUpdate->roles->sync($request->role);
            DB::commit();

            return redirect()->route('backend.users.index')->with('flash_success', __('labels.pages.backend.users.messages.update_user_success'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
        }
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
