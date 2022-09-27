<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory(10)->create();

        Product::create([
            'name' => 'i-SENSYS',
            'description' => 'A rapid, flexible colour laser printer with impressive paper capacity and a fast print speed.',
            'code' => 'LBP712C',
            'uuid' => '',
            'points' => 1,
            'filename' => 'product-1.jpg',
            'is_published' => 1,
            'product_category_id' => 2
        ]);

        Product::create([
            'name' => 'i-SENSYS',
            'description' => 'Get superior print speeds and flexible media handling with this compact black printer.',
            'code' => 'LBP325x',
            'uuid' => '',
            'points' => 1,
            'filename' => 'product-2.jpg',
            'is_published' => 1,
            'product_category_id' => 2
        ]);

        Product::create([
            'name' => 'imagePress',
            'description' => 'Enjoy productive print speeds and superb quality with this advanced printer.',
            'code' => 'C650',
            'uuid' => '',
            'points' => 2,
            'filename' => 'product-3.jpg',
            'is_published' => 1,
            'product_category_id' => 2
        ]);

        Product::create([
            'name' => 'imageRUNNER ADVANCE',
            'description' => 'Powerful productivity, quality and finishing options, perfect in high print.',
            'code' => 'C7500 Series',
            'uuid' => '',
            'points' => 8,
            'filename' => 'product-4.jpg',
            'is_published' => 1,
            'product_category_id' => 2
        ]);

        Product::create([
            'name' => 'i-SENSYS',
            'description' => 'Effortless operation and maintenance make this the complete machine.',
            'code' => 'FAX-L170',
            'uuid' => '',
            'points' => 2,
            'filename' => 'product-5.jpg',
            'is_published' => 1,
            'product_category_id' => 2
        ]);

        Product::create([
            'name' => 'imagePRESS',
            'description' => 'Take business to another level with print presses fine-tuned for rapid production.',
            'code' => 'C910 Series',
            'uuid' => '',
            'points' => 10,
            'filename' => 'product-6.jpg',
            'is_published' => 1,
            'product_category_id' => 2
        ]);

        Product::create([
            'name' => 'XEED SERIES',
            'description' => 'A compact, lightweight 4K LCOS laser projector boasting 6000 lumen brightness.',
            'code' => 'XEED 4K6021Z',
            'uuid' => '',
            'points' => 2,
            'filename' => 'product-7.jpg',
            'is_published' => 1,
            'product_category_id' => 3
        ]);

        Product::create([
            'name' => 'LX SERIES',
            'description' => 'A compact, high brightness, installation DLP laser projector boasting great quality.',
            'code' => 'LX-MH502Z',
            'uuid' => '',
            'points' => 1,
            'filename' => 'product-8.jpg',
            'is_published' => 1,
            'product_category_id' => 3
        ]);

        Product::create([
            'name' => 'Presenter',
            'description' => 'A compact wireless presenter, with a range of up to 15m and a red laser.',
            'code' => 'Canon PR1100-R',
            'uuid' => '',
            'points' => 1,
            'filename' => 'product-9.jpg',
            'is_published' => 1,
            'product_category_id' => 1
        ]);
    }
}
