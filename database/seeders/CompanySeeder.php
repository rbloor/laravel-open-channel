<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Company::factory(10)->create();

        Company::create([
            'name' => 'Ryan Bloor LTD',
            'company_category_id' => '1',
            'is_published' => 1
        ]);

        Company::create([
            'name' => 'Works Digital LTD',
            'company_category_id' => '1',
            'is_published' => 1
        ]);

        Company::create([
            'name' => 'Priodev Media LTD',
            'company_category_id' => '1',
            'is_published' => 1
        ]);
    }
}
