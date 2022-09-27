<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Setting::factory(10)->create();

        \App\Models\Setting::create(
            [
                'setting_key' => 'vat_rate',
                'setting_value' => '0.20',
                'is_editable' => 1,
                'is_deletable' => 0,
            ]
        );

        \App\Models\Setting::create(
            [
                'setting_key' => 'ni_rate',
                'setting_value' => '0.155',
                'is_editable' => 1,
                'is_deletable' => 0,
            ]
        );

        \App\Models\Setting::create(
            [
                'setting_key' => 'optout_count',
                'setting_value' => 0,
                'is_editable' => 0,
                'is_deletable' => 0,
            ]
        );
    }
}
