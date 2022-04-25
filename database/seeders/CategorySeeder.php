<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Cats;
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
        Category::create([
            'name' => 'Tiên hiệp',
            'cat_slug' => 'tien-hiep'
        ]);
        Category::create([
            'name' => 'Kiếm hiệp',
            'cat_slug' => 'kiem-hiep'
        ]);
        Category::create([
            'name' => 'Huyền huyễn',
            'cat_slug' => 'huyen-huyen'
        ]);
        Category::create([
            'name' => 'Lịch sử',
            'cat_slug' => 'lich-su'
        ]);
        Category::create([
            'name' => 'Đô thị',
            'cat_slug' => 'do-thi'
        ]);

        Cats::create([
            'name' => 'Tiên hiệp',
            'cat_slug' => 'tien-hiep'
        ]);
        Cats::create([
            'name' => 'Kiếm hiệp',
            'cat_slug' => 'kiem-hiep'
        ]);
        Cats::create([
            'name' => 'Huyền huyễn',
            'cat_slug' => 'huyen-huyen'
        ]);
        Cats::create([
            'name' => 'Lịch sử',
            'cat_slug' => 'lich-su'
        ]);
        Cats::create([
            'name' => 'Đô thị',
            'cat_slug' => 'do-thi'
        ]);

    }
}
