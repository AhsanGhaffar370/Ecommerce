<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Carbon\Carbon;

class CreateCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => 'category 1',
                'parent_id' => null,
                'status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'category 2',
                'parent_id' => 1,
                'status' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'category 3',
                'parent_id' => null,
                'status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'category 4',
                'parent_id' => 2,
                'status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'category 5',
                'parent_id' => null,
                'status' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'category 6',
                'parent_id' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'category 7',
                'parent_id' => 4,
                'status' => 1,
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
