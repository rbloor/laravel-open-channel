<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\CompanyCategory::class => \App\Policies\CompanyCategoryPolicy::class,
        \App\Models\Company::class => \App\Policies\CompanyPolicy::class,
        \App\Models\Feedback::class => \App\Policies\FeedbackPolicy::class,
        \App\Models\Membership::class => \App\Policies\MembershipPolicy::class,
        \App\Models\Page::class => \App\Policies\PagePolicy::class,
        \App\Models\Product::class => \App\Policies\ProductPolicy::class,
        \App\Models\ProductCategory::class => \App\Policies\ProductCategoryPolicy::class,
        \App\Models\ProductOffer::class => \App\Policies\ProductOfferPolicy::class,
        \App\Models\Redemption::class => \App\Policies\RedemptionPolicy::class,
        \App\Models\Resource::class => \App\Policies\ResourcePolicy::class,
        \App\Models\Reward::class => \App\Policies\RewardPolicy::class,
        \App\Models\RewardCategory::class => \App\Policies\RewardCategoryPolicy::class,
        \App\Models\Sale::class => \App\Policies\SalePolicy::class,
        \App\Models\Setting::class => \App\Policies\SettingPolicy::class,
        \App\Models\Transaction::class => \App\Policies\TransactionPolicy::class,
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Offer::class => \App\Policies\OfferPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "super-admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });
    }
}
