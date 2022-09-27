<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\ProductCategory::factory(10)->create();

        ProductCategory::create([
            'name' => 'Workspace / Hardware',
            'description' => 'Dolore eum est suscipit omnis nihil voluptas. Non est porro totam similique doloremque qui amet. Asperiores laudantium harum et itaque consequatur facilis. Quisquam magni qui molestiae totam vero deleniti voluptatem.',
            'is_published' => 1,
            'filename' => 'product-category-1.jpg'
        ]);

        ProductCategory::create([
            'name' => 'LFT',
            'description' => 'Dolore eum est suscipit omnis nihil voluptas. Non est porro totam similique doloremque qui amet. Asperiores laudantium harum et itaque consequatur facilis. Quisquam magni qui molestiae totam vero deleniti voluptatem.',
            'is_published' => 1,
            'filename' => 'product-category-2.jpg'
        ]);

        ProductCategory::create([
            'name' => 'ProPrint',
            'description' => 'Dolore eum est suscipit omnis nihil voluptas. Non est porro totam similique doloremque qui amet. Asperiores laudantium harum et itaque consequatur facilis. Quisquam magni qui molestiae totam vero deleniti voluptatem.',
            'is_published' => 1,
            'filename' => 'product-category-3.jpg'
        ]);

        ProductCategory::create([
            'name' => 'Software',
            'description' => 'Dolore eum est suscipit omnis nihil voluptas. Non est porro totam similique doloremque qui amet. Asperiores laudantium harum et itaque consequatur facilis. Quisquam magni qui molestiae totam vero deleniti voluptatem.',
            'is_published' => 1,
            'filename' => 'product-category-4.jpg'
        ]);
    }
}
