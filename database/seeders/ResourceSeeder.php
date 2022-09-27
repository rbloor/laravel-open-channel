<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Resource::factory(10)->create();

        Resource::create([
            'name' => 'Useful Link 1',
            'description' => 'Dolore eum est suscipit omnis nihil voluptas. Non est porro totam similique doloremque qui amet. Asperiores laudantium harum et itaque consequatur facilis. Quisquam magni qui molestiae totam vero deleniti voluptatem.',
            'is_external' => 1,
            'is_published' => 1,
            'filename' => 'resource-1.jpg',
            'url' => 'https://worksdigital.co.uk/'
        ]);

        Resource::create([
            'name' => 'Useful Link 2',
            'description' => 'Dolore eum est suscipit omnis nihil voluptas. Non est porro totam similique doloremque qui amet. Asperiores laudantium harum et itaque consequatur facilis. Quisquam magni qui molestiae totam vero deleniti voluptatem.',
            'is_external' => 1,
            'is_published' => 1,
            'filename' => 'resource-2.jpg',
            'url' => 'https://worksdigital.co.uk/'
        ]);

        Resource::create([
            'name' => 'Useful Link 3',
            'description' => 'Dolore eum est suscipit omnis nihil voluptas. Non est porro totam similique doloremque qui amet. Asperiores laudantium harum et itaque consequatur facilis. Quisquam magni qui molestiae totam vero deleniti voluptatem.',
            'is_external' => 0,
            'is_published' => 1,
            'filename' => 'resource-3.jpg',
            'download' => 'resource-3.pdf'
        ]);
    }
}
