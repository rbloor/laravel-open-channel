<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanyCategorySeeder::class); // done
        $this->call(CompanySeeder::class); // done
        $this->call(RoleAndPermissionSeeder::class); // TBD
        $this->call(UserSeeder::class); // done
        $this->call(ResourceSeeder::class); // done
        $this->call(SettingSeeder::class); // done
        $this->call(RewardCategorySeeder::class); // done
        $this->call(RewardSeeder::class); // done
        $this->call(ProductCategorySeeder::class); // done
        $this->call(ProductSeeder::class); // done
        $this->call(ProductOfferSeeder::class); // done
        $this->call(PageSeeder::class);

        //$this->call(TransactionSeeder::class);
        //$this->call(FeedbackSeeder::class);
        //$this->call(SaleSeeder::class);
        //$this->call(RedemptionSeeder::class);
    }
}
