<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin

        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'super-admin@canon.com',
            'password' => bcrypt('password'),
            'approved_at' => now(),
        ])->assignRole('super-admin');

        // Admin

        User::create([
            'first_name' => 'WMC',
            'last_name' => 'Admin',
            'email' => 'admin@canon.com',
            'password' => bcrypt('password'),
            'approved_at' => now(),
        ])->assignRole('wmc-admin');

        // Editor

        User::create([
            'first_name' => 'WMC',
            'last_name' => 'Editor',
            'email' => 'editor@canon.com',
            'password' => bcrypt('password'),
            'approved_at' => now(),
        ])->assignRole('wmc-editor');

        // Client

        User::create([
            'first_name' => 'Client',
            'last_name' => 'Admin',
            'email' => 'client@canon.com',
            'password' => bcrypt('password'),
            'approved_at' => now(),
        ])->assignRole('client-admin');

        // Users

        User::create([
            'first_name' => 'Marc',
            'last_name' => 'Garfield',
            'email' => 'marc@priodev.com',
            'password' => bcrypt('password'),
            'approved_at' => now(),
        ])->assignRole('user')->membership()->associate(
            \App\Models\Membership::factory()->create()->id
        )->save();

        User::create([
            'first_name' => 'Phil',
            'last_name' => 'Ward',
            'email' => 'phil.w@worksdigital.co.uk',
            'password' => bcrypt('password'),
            'approved_at' => now(),
        ])->assignRole('user')->membership()->associate(
            \App\Models\Membership::factory()->create()->id
        )->save();

        User::create([
            'first_name' => 'Ryan',
            'last_name' => 'Bloor',
            'email' => 'ryanbloor@me.com',
            'password' => bcrypt('kenny123'),
            'approved_at' => now(),
        ])->assignRole('user')->membership()->associate(
            \App\Models\Membership::factory()->create()->id
        )->save();
    }
}
