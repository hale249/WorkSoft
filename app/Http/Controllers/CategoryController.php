<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Helpers\ResponseTrait;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Models\TimeTable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use voku\helper\HtmlDomParser;

class CategoryController extends ProtectedController
{
    use ResponseTrait;

    public function index(Request $request)
    {
        if (Helper::checkRole($this->currentUser) == false) {
            return \view('share.errors.403');
        }

        $data = $request->all();
        $categories = Category::query()->with('user');
        if (!empty($data['name'])) {
            $categories = $categories->where('name', 'like', '%' . $data['name'] . '%');
        }

        $userId = !empty($data['user_id']) ? $data['user_id'] : null;

        if (!empty($userId)) {
            $categories = $categories->where('user_id', $userId);
        }

        $categories = $categories->orderBy('created_at', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        return view('elements.category.index', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $data = $request->only([
            'name',
            'description',
        ]);
        $category = Category::query()
            ->create($data);
        if (empty($category)) {
            return $this->error('Thêm thất bại');
        }

        return $this->success('Thêm danh mục thành công', $category);
    }

    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);

        return $this->success('Get by category successfully', $category);
    }

    public function update(CategoryStoreRequest $request, $id)
    {
        $data = $request->only([
            'name',
            'description',
        ]);
        $category = Category::query()->findOrFail($id);

        $categoryUpdate = $category->update($data);

        if (empty($categoryUpdate)) {
            return $this->error('Chỉnh sửa thất bại');
        }

        return $this->success('Cập nhật thành công', $categoryUpdate);
    }

    public function destroy($id)
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();


        return $this->success('Xóa thành công');
    }
}
