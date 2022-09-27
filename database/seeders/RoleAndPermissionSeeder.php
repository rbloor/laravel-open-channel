<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::create(['name' => 'create_company_category']);
        Permission::create(['name' => 'edit_company_category']);
        Permission::create(['name' => 'delete_company_category']);
        Permission::create(['name' => 'view_company_category']);

        Permission::create(['name' => 'create_company']);
        Permission::create(['name' => 'edit_company']);
        Permission::create(['name' => 'delete_company']);
        Permission::create(['name' => 'view_company']);

        Permission::create(['name' => 'create_feedback']);
        Permission::create(['name' => 'delete_feedback']);
        Permission::create(['name' => 'view_feedback']);

        Permission::create(['name' => 'approve_membership']);
        Permission::create(['name' => 'reject_membership']);
        Permission::create(['name' => 'view_membership']);

        Permission::create(['name' => 'edit_page']);
        Permission::create(['name' => 'view_page']);

        Permission::create(['name' => 'create_product_category']);
        Permission::create(['name' => 'edit_product_category']);
        Permission::create(['name' => 'delete_product_category']);
        Permission::create(['name' => 'view_product_category']);

        Permission::create(['name' => 'create_product_offer']);
        Permission::create(['name' => 'edit_product_offer']);
        Permission::create(['name' => 'delete_product_offer']);
        Permission::create(['name' => 'view_product_offer']);

        Permission::create(['name' => 'create_product']);
        Permission::create(['name' => 'edit_product']);
        Permission::create(['name' => 'delete_product']);
        Permission::create(['name' => 'view_product']);

        Permission::create(['name' => 'create_redemption']);
        Permission::create(['name' => 'approve_redemption']);
        Permission::create(['name' => 'reject_redemption']);
        Permission::create(['name' => 'delete_redemption']);
        Permission::create(['name' => 'view_redemption']);

        Permission::create(['name' => 'view_report']);

        Permission::create(['name' => 'create_resource']);
        Permission::create(['name' => 'edit_resource']);
        Permission::create(['name' => 'delete_resource']);
        Permission::create(['name' => 'view_resource']);

        Permission::create(['name' => 'create_reward_category']);
        Permission::create(['name' => 'edit_reward_category']);
        Permission::create(['name' => 'delete_reward_category']);
        Permission::create(['name' => 'view_reward_category']);

        Permission::create(['name' => 'create_reward']);
        Permission::create(['name' => 'edit_reward']);
        Permission::create(['name' => 'delete_reward']);
        Permission::create(['name' => 'view_reward']);

        Permission::create(['name' => 'create_sale']);
        Permission::create(['name' => 'bulk_create_sale']);
        Permission::create(['name' => 'approve_sale']);
        Permission::create(['name' => 'reject_sale']);
        Permission::create(['name' => 'delete_sale']);
        Permission::create(['name' => 'view_sale']);

        Permission::create(['name' => 'create_setting']);
        Permission::create(['name' => 'edit_setting']);
        Permission::create(['name' => 'delete_setting']);
        Permission::create(['name' => 'view_setting']);

        Permission::create(['name' => 'create_transaction']);
        Permission::create(['name' => 'view_transaction']);

        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'edit_user']);
        Permission::create(['name' => 'delete_user']);
        Permission::create(['name' => 'view_user']);

        Permission::create(['name' => 'create_offer']);
        Permission::create(['name' => 'edit_offer']);
        Permission::create(['name' => 'delete_offer']);
        Permission::create(['name' => 'view_offer']);

        // create roles and assign created permissions

        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'wmc-admin'])->givePermissionTo([
            Permission::all()
        ]);
        Role::create(['name' => 'wmc-editor'])->givePermissionTo([
            'create_company',
            'edit_company',
            'view_company',
            'create_company_category',
            'edit_company_category',
            'view_company_category',
            'edit_page',
            'view_page',
            'create_resource',
            'edit_resource',
            'view_resource',
            'create_product',
            'edit_product',
            'view_product',
            'create_product_category',
            'edit_product_category',
            'view_product_category',
            'create_product_offer',
            'edit_product_offer',
            'view_product_offer',
            'create_reward',
            'edit_reward',
            'delete_reward',
            'view_reward',
            'create_reward_category',
            'edit_reward_category',
            'delete_reward_category',
            'view_reward_category',
            'view_transaction',
            'view_report',
        ]);
        Role::create(['name' => 'client-admin'])->givePermissionTo([
            'view_membership',
            'approve_membership',
            'reject_membership',
            'view_sale',
            'approve_sale',
            'reject_sale',
            'view_redemption',
            'approve_redemption',
            'reject_redemption',
            'view_transaction',
            'view_report',
            'view_feedback',
        ]);
        Role::create(['name' => 'user'])->givePermissionTo([
            'create_sale',
            'delete_sale',
            'view_sale',
            'create_redemption',
            'delete_redemption',
            'view_redemption',
            'create_feedback',
            'view_product',
            'view_reward',
        ]);
    }
}
