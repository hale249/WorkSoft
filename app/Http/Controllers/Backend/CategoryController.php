<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Constant;
use App\Helpers\PermissionConstant;
use App\Helpers\Traits\FileHelperTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use FileHelperTrait;

    public function index(Request $request)
    {
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

        return view('backend.elements.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('backend.elements.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $data = $request->only([
            'name',
            'description',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->file('image'), 'categories');
        }

        $data['user_id'] = auth()->id();
        Category::query()
            ->create($data);

        return redirect()->route('backend.category.index')->with('flash_success', __('labels.pages.backend.category.messages.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     * @throws AuthorizationException
     */
    public function show($id): View
    {
        $category = Category::query()->findOrFail($id);

        return view('backend.elements.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     * @throws AuthorizationException
     */
    public function edit($id): View
    {
        $category = Category::query()->findOrFail($id);

        return view('backend.elements.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(CategoryStoreRequest $request, $id): RedirectResponse
    {
        $data = $request->only([
            'name',
            'description',
        ]);
        $category = Category::query()->findOrFail($id);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->file('image'), 'categories');
        }

        $category->update($data);

        return redirect()->route('backend.category.index')->with('flash_success', __('labels.pages.backend.category.messages.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();

        return redirect()->route('backend.category.index')->with('flash_success', __('labels.pages.backend.category.messages.delete_success'));
    }
}
