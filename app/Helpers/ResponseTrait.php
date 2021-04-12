<?php

namespace App\Helpers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    protected function success(string $message = '', $data = null, int $statusCode = 200, ?array $meta = null): JsonResponse
    {
        $response = [
            'code' => $statusCode,
            'message' => $message,
        ];

        if (!empty($meta)) {
            $newData = ['meta' => $meta];

            if ($data !== null) {
                $newData['data'] = $data;
            }

            $response['data'] = $newData;
        } else {
            if ($data !== null) {
                $response['data'] = $data;
            }
        }

        return response()->json($response, 200, [], JSON_INVALID_UTF8_IGNORE);
    }

    protected function successWithPaginate(string $message, LengthAwarePaginator $data, int $statusCode = 200): JsonResponse
    {
        $newData['data'] = $data->items();
        $newData['meta'] = [
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'total_pages' => $data->lastPage()
            ]
        ];
        return response()->json(
            [
                'code' => $statusCode,
                'message' => $message,
                'data' => $newData,
            ], 200, [], JSON_INVALID_UTF8_IGNORE
        );
    }

    protected function error(string $message = '', $errors = [], int $statusCode = 400): JsonResponse
    {
        return response()->json(
            [
                'code' => $statusCode,
                'message' => $message,
                'errors' => $errors
            ], 200, [], JSON_INVALID_UTF8_IGNORE
        );
    }

    protected function errorAuthorization(string $message = '', $errors = [], int $statusCode = 403): JsonResponse
    {
        if (!$message) {
            $message = 'You are not authorized to access this page';
        }
        return response()->json(
            [
                'code' => $statusCode,
                'message' => $message,
                'errors' => $errors
            ]
        );
    }
}
