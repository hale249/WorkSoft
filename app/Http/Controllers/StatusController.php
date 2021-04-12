<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Helpers\Helper;
use App\Helpers\ResponseTrait;
use App\Helpers\Traits\FileHelperTrait;
use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends ProtectedController
{
    use FileHelperTrait, ResponseTrait;

    public function index()
    {
        if (Helper::checkRole($this->currentUser) == false) {
            return \view('share.errors.403');
        }

        $statuses = Status::query()
            ->orderBy('created_at', 'desc')
            ->paginate(Constant::DEFAULT_PER_PAGE);

        return view('elements.status.index', compact('statuses'));
    }

    public function store(StatusRequest $request)
    {
        $data = $request->only([
            'name',
            'description',
            'color'
        ]);

        $status = Status::query()
            ->create($data);

        return $this->success('Tạo trạng thái thành công', $status);
    }

    public function edit($id)
    {
        $status = Status::query()->findOrFail($id);

        return $this->success('', $status);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'color',
            'description',
        ]);
        $status = Status::query()->findOrFail($id);

        $status->update($data);

        return $this->success('Chỉnh sửa trạng thái thành công', $status);
    }

    public function destroy($id)
    {
        $status = Status::query()->findOrFail($id);
        $status->delete();

        return $this->success('Xóa trạng thái thành công');
    }
}
