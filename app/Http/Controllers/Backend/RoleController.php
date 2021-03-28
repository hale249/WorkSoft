<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::query()
            ->orderBy('created_at', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        return view('backend.elements.role.index', compact('roles'));
    }

    public function edit(int $id)
    {
        $role = Role::find($id);

        return view('backend.role.edit', compact('role'));
    }

    public function update(Request $request,int $id)
    {
        $role = Role::find($id);
        $data = $request->only([
            'description'
        ]);

        $role->update($data);
        return redirect()->route('backend.roles.index')->with('flash_success', __('Cập nhật quyền thành công'));
    }
}
