<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo dữ liệu mẫu bảng danh mục
        Category::query()->updateOrCreate([
            'name' => 'Công việc khoa',
            'description' => 'Công việc của khoa'
        ]);

        Category::query()->updateOrCreate([
            'name' => 'Công việc bộ môn',
            'description' => 'Công việc của bô môn'
        ]);
    }
}
