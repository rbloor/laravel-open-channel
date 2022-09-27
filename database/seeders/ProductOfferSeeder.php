<?php

namespace Database\Seeders;

use App\Models\ProductOffer;
use Illuminate\Database\Seeder;

class ProductOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ProductOffer::factory(3)->create();

        ProductOffer::create([
            'name' => 'Triple points',
            'description' => 'Sell this item to earn triple points!',
            'multiplier' => 3,
            'product_id' => 1
        ]);
    }
}
