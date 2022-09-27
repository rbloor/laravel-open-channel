<?php

namespace Database\Seeders;

use App\Models\RewardCategory;
use Illuminate\Database\Seeder;

class RewardCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\RewardCategory::factory(10)->create();

        RewardCategory::create([
            'name' => 'Pre-Paid Virtual Credit Card',
            'description' => 'Dolore eum est suscipit omnis nihil voluptas. Non est porro totam similique doloremque qui amet. Asperiores laudantium harum et itaque consequatur facilis. Quisquam magni qui molestiae totam vero deleniti voluptatem.',
            'is_published' => 1,
            'filename' => 'reward-category-1.jpg'
        ]);
    }
}
