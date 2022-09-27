<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Page::factory(10)->create();

        Page::create([
            'name' => 'Home',
            'filename' => 'banner-home.jpg',
            'banner_title' => 'Welcome to the Canon',
            'banner_subtitle' => 'Incentive Scheme',
            'banner_paragraph' => 'The Incentive Scheme with a difference!',
        ]);

        Page::create([
            'name' => 'Login',
            'filename' => 'banner-login.jpg',
            'banner_title' => 'Welcome to the Canon',
            'banner_subtitle' => 'Incentive Scheme',
            'banner_paragraph' => 'The Incentive Scheme with a difference!',
        ]);

        Page::create([
            'name' => 'Products',
            'filename' => 'banner-products.jpg',
            'banner_title' => 'Look out for bonus points',
            'banner_subtitle' => 'on selected products',
        ]);

        Page::create([
            'name' => 'Rewards',
            'filename' => 'banner-rewards.jpg',
            'banner_title' => 'User your reward points',
            'banner_subtitle' => 'to claim these rewards',
        ]);

        Page::create([
            'name' => 'How It Works',
            'filename' => 'banner-how-it-works.jpg',
            'banner_title' => 'Everything you need',
            'banner_subtitle' => 'to help you sell Canon',
        ]);

        Page::create([
            'name' => 'Upload Sales',
            'filename' => 'banner-upload-sales.jpg',
            'banner_title' => 'Upload your sales claim',
        ]);

        Page::create([
            'name' => 'My Profile',
            'filename' => 'banner-my-profile.jpg',
            'banner_title' => 'My profile',
        ]);

        Page::create([
            'name' => 'My Points',
            'filename' => 'banner-my-points.jpg',
            'banner_title' => 'My points',
        ]);

        Page::create([
            'name' => 'My Sales',
            'filename' => 'banner-my-sales.jpg',
            'banner_title' => 'My sales',
        ]);

        Page::create([
            'name' => 'My Redemptions',
            'filename' => 'banner-my-redemptions.jpg',
            'banner_title' => 'My redemptions',
        ]);

        Page::create([
            'name' => 'Feedback',
            'filename' => 'banner-feedback.jpg',
            'banner_title' => 'Give us your feedback',
            'banner_subtitle' => 'to help us improve',
        ]);
    }
}
