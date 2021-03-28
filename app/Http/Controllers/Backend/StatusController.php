<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Constant;
use App\Helpers\PermissionConstant;
use App\Helpers\Traits\FileHelperTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\StatusRequest;
use App\Models\Category;
use App\Models\Status;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusController extends Controller
{
    use FileHelperTrait;

    public function index()
    {
        $statuses = Status::query()
            ->orderBy('created_at', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        return view('backend.elements.status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('backend.elements.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StatusRequest $request
     * @return RedirectResponse
     */
    public function store(StatusRequest $request): RedirectResponse
    {
        $data = $request->only([
            'name',
            'description',
            'color'
        ]);

        Status::query()
            ->create($data);

        return redirect()->route('backend.status.index')->with('flash_success', __('Tạo mới trạng thái thành công'));
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
        $status = Status::query()->findOrFail($id);

        return view('backend.elements.status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->only([
            'color',
            'description',
        ]);
        $status = Status::query()->findOrFail($id);

        $status->update($data);

        return redirect()->route('backend.status.index')->with('flash_success', __('Chỉnh sửa trạng thái thành công'));
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
        $status = Status::query()->findOrFail($id);
        $status->delete();

        return redirect()->route('backend.status.index')->with('flash_success', __('Xoá trạng thái thành công'));
    }
}
