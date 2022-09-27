<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Reward::factory(10)->create();

        Reward::create([
            'name' => '£10 Virtual Gift Account',
            'description' => 'Redeem your points for a pre-paid Mastercard Virtual Gift Account, that can be delivered quickly via email.',
            'is_published' => 1,
            'is_physical' => 0,
            'filename' => 'reward-1.jpg',
            'points' => 10,
            'reward_category_id' => 1
        ]);

        Reward::create([
            'name' => '£20 Virtual Gift Account',
            'description' => 'Redeem your points for a pre-paid Mastercard Virtual Gift Account, that can be delivered quickly via email.',
            'is_published' => 1,
            'is_physical' => 0,
            'filename' => 'reward-2.jpg',
            'points' => 20,
            'reward_category_id' => 1
        ]);

        Reward::create([
            'name' => '£30 Virtual Gift Account',
            'description' => 'Redeem your points for a pre-paid Mastercard Virtual Gift Account, that can be delivered quickly via email.',
            'is_published' => 1,
            'is_physical' => 0,
            'filename' => 'reward-3.jpg',
            'points' => 30,
            'reward_category_id' => 1
        ]);
    }
}
