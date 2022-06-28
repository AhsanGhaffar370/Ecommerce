<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;

class CreateProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'product 1',
                'slug' => 'product-1',
                'image' => 'product1.jpg',
                'description' => 'lorem ipsum',
                'price' => '100',
                'quantity' => '20',
                'status' => 1
            ],
            [
                'name' => 'product 2',
                'slug' => 'product-2',
                'image' => 'product2.jpg',
                'description' => 'lorem ipsum',
                'price' => '120',
                'quantity' => '3',
                'status' => 1
            ],
            [
                'name' => 'product 3',
                'slug' => 'product-3',
                'image' => 'product3.jpg',
                'description' => 'lorem ipsum',
                'price' => '40',
                'quantity' => '0',
                'status' => 1
            ],
            [
                'name' => 'product 4',
                'slug' => 'product-4',
                'image' => 'product4.jpg',
                'description' => 'lorem ipsum',
                'price' => '64',
                'quantity' => '12',
                'status' => 1
            ],
            [
                'name' => 'product 5',
                'slug' => 'product-5',
                'image' => 'product5.jpg',
                'description' => 'lorem ipsum',
                'price' => '64',
                'quantity' => '15',
                'status' => 0
            ]
        ]);
    }
}
