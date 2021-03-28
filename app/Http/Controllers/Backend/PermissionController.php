<?php


namespace App\Http\Controllers\Backend;


use App\Helpers\Constant;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $query = Permission::query();
        if (!empty($data['name'])) {
            $query = $query->where('name', 'like', '%' . $data['name'] . '%');
        }

        $permissions = $query->orderBy('created_at', 'desc')
            ->paginate(30);

        return view('backend.elements.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.elements.permission.create');
    }

    public function store(Request  $request)
    {
        $data = $request->only([
            'name',
            'description'
        ]);

        Permission::create($data);
        return redirect()->route('backend.permissions.index')->with('flash_success', __('Thêm vai trò thành công'));
    }

    public function edit(int $id)
    {
        $permission = Permission::find($id);

        return view('backend.elements.permission.edit', compact('permission'));
    }

    public function update(Request $request,int $id)
    {
        $permission = Permission::find($id);
        $data = $request->only([
            'description'
        ]);

        $permission->update($data);
        return redirect()->route('backend.permissions.index')->with('flash_success', __('Cập nhật vai trò thành công'));
    }

    public function destroy(int $id)
    {
        $permission = Permission::find($id);

        $permission->delete();

        return redirect()->back()->with('flash_success', 'Xóa vai trò thành công');
    }
}
