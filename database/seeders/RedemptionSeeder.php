<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class RedemptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Redemption::factory(10)->create()->each(function ($redemption) {
            $rewardIds = Arr::random(\App\Models\Reward::pluck('id')->toArray(), 5);
            foreach ($rewardIds as $rewardId) {
                $redemption->rewards()->attach(
                    $rewardId,
                    [
                        'quantity' => rand(1, 5),
                        'points' => rand(50, 200),
                    ]
                );
            }
        });
    }
}
