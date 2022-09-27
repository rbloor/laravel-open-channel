<x-nav.link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
    <svg class="text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
    </svg>
    {{ __('Dashboard') }}
</x-nav.link>

<x-nav.heading>{{ __('Manage') }}</x-nav.heading>

@can('view_transaction')
<x-nav.link href="{{ route('admin.transaction.index') }}" :active="request()->routeIs('admin.transaction.*')">
    <svg class="text-gray-{{ request()->routeIs('admin.transaction.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
    </svg>
    {{ __('Transactions') }}
</x-nav.link>
@endcan

@can('view_sale')
<x-nav.link href="{{ route('admin.sale.index') }}" :active="request()->routeIs('admin.sale.*')">
    <svg class="text-gray-{{ request()->routeIs('admin.sale.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
    </svg>
    {{ __('Sales') }}
</x-nav.link>
@endcan

@can('view_redemption')
<x-nav.link href="{{ route('admin.redemption.index') }}" :active="request()->routeIs('admin.redemption.*')">
    <svg class="text-gray-{{ request()->routeIs('admin.redemption.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
    </svg>
    {{ __('Redemptions') }}
</x-nav.link>
@endcan

@can('view_membership')
<x-nav.link href="{{ route('admin.membership.index') }}" :active="request()->routeIs('admin.membership.*')">
    <svg class="text-gray-{{ request()->routeIs('admin.membership.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    {{ __('Memberships') }}
</x-nav.link>
@endcan

@if (
auth()->user()->can('view_page') ||
auth()->user()->can('view_resource') ||
auth()->user()->can('view_product') ||
auth()->user()->can('view_product_category') ||
auth()->user()->can('view_product_offer') ||
auth()->user()->can('view_reward') ||
auth()->user()->can('view_reward_category') ||
auth()->user()->can('view_company') ||
auth()->user()->can('view_company_category')
)
<x-nav.heading>{{ __('Content') }}</x-nav.heading>
@endif

@can('view_page')
<x-nav.link href="{{ route('admin.page.index') }}" :active="request()->routeIs('admin.page.*')">
    <svg class="text-gray-{{ request()->routeIs('admin.page.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
    </svg>
    {{ __('Pages') }}
</x-nav.link>
@endcan

@can('view_resource')
<x-nav.link href="{{ route('admin.resource.index') }}" :active="request()->routeIs('admin.resource.*')">
    <svg class="text-gray-{{ request()->routeIs('admin.resource.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
    </svg>
    {{ __('Resources') }}
</x-nav.link>
@endcan

@if ( auth()->user()->can('view_product') || auth()->user()->can('view_product_category') || auth()->user()->can('view_product_offer') )
<div class="space-y-1" x-data="{ open: false }">
    <button @click="open = !open" type="button" :class="[open ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600']" class="hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" aria-controls="sub-menu-2" aria-expanded="false">
        <svg class="text-gray-{{ request()->routeIs('admin.sale.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
        </svg>
        <span class="flex-1">{{ __('Products') }}</span>
        <svg :class="[open ? 'text-gray-400 rotate-90' : 'text-gray-300']" class="ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
        </svg>
    </button>
    <div class="space-y-1" x-show="open">
        @can('view_product')
        <x-nav.sub-link href="{{ route('admin.product.index') }}" :active="request()->routeIs('admin.product.*')">{{ __('Overview') }}</x-nav.sub-link>
        @endcan
        @can('view_product_category')
        <x-nav.sub-link href="{{ route('admin.product_category.index') }}" :active="request()->routeIs('admin.product_category.*')">{{ __('Product Categories') }}</x-nav.sub-link>
        @endcan
        @can('view_product_offer')
        <x-nav.sub-link href="{{ route('admin.product_offer.index') }}" :active="request()->routeIs('admin.product_offer.*')">{{ __('Product Offers') }}</x-nav.sub-link>
        @endcan
    </div>
</div>
@endif

@if ( auth()->user()->can('view_reward') || auth()->user()->can('view_reward_category') )
<div class="space-y-1" x-data="{ open: false }">
    <button @click="open = !open" type="button" :class="[open ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600']" class="hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" aria-controls="sub-menu-2" aria-expanded="false">
        <svg class="text-gray-{{ request()->routeIs('admin.redemption.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <span class="flex-1">{{ __('Rewards') }}</span>
        <svg :class="[open ? 'text-gray-400 rotate-90' : 'text-gray-300']" class="ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
        </svg>
    </button>
    <div class="space-y-1" x-show="open">
        @can('view_reward')
        <x-nav.sub-link href="{{ route('admin.reward.index') }}" :active="request()->routeIs('admin.reward.*')">{{ __('Overview') }}</x-nav.sub-link>
        @endcan
        @can('view_reward_category')
        <x-nav.sub-link href="{{ route('admin.reward_category.index') }}" :active="request()->routeIs('admin.reward_category.*')">{{ __('Reward Categories') }}</x-nav.sub-link>
        @endcan
    </div>
</div>
@endif

@if ( auth()->user()->can('view_company') || auth()->user()->can('view_company_category') )
<div class="space-y-1" x-data="{ open: false }">
    <button @click="open = !open" type="button" :class="[open ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600']" class="hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" aria-controls="sub-menu-2" aria-expanded="false">
        <svg class="text-gray-{{ request()->routeIs('admin.redemption.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        <span class="flex-1">{{ __('Companies') }}</span>
        <svg :class="[open ? 'text-gray-400 rotate-90' : 'text-gray-300']" class="ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
        </svg>
    </button>
    <div class="space-y-1" x-show="open">
        @can('view_company')
        <x-nav.sub-link href="{{ route('admin.company.index') }}" :active="request()->routeIs('admin.company.*')">{{ __('Overview') }}</x-nav.sub-link>
        @endcan
        @can('view_company_category')
        <x-nav.sub-link href="{{ route('admin.company_category.index') }}" :active="request()->routeIs('admin.company_category.*')">{{ __('Company Categories') }}</x-nav.sub-link>
        @endcan
    </div>
</div>
@endif

@if ( auth()->user()->can('view_user') || auth()->user()->can('view_report') || auth()->user()->can('view_feedback') )
<x-nav.heading>{{ __('System') }}</x-nav.heading>
@endif

@can('view_user')
<x-nav.link href="{{ route('admin.user.index') }}" :active="request()->routeIs('admin.user.*')">
    <svg class="text-gray-{{ request()->routeIs('admin.user.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    {{ __('Users') }}
</x-nav.link>
@endcan

@can('view_report')
<x-nav.link href="{{ route('admin.reporting') }}" :active="request()->routeIs('admin.reporting')">
    <svg class="mr-3 flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
    </svg>
    {{ __('Reports') }}
</x-nav.link>
@endcan

@can('view_feedback')
<x-nav.link href="{{ route('admin.feedback.index') }}" :active="request()->routeIs('admin.feedback.*')">
    <svg class="text-gray-{{ request()->routeIs('admin.feedback.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
    </svg>
    {{ __('Feedback') }}
</x-nav.link>
@endcan

@if ( auth()->user()->can('bulk_create_sale') || auth()->user()->can('view_setting') || auth()->user()->can('view_offer') )
<div class="space-y-1" x-data="{ open: false }">
    <button @click="open = !open" type="button" :class="[open ? 'bg-gray-100 text-gray-900' : 'bg-white text-gray-600']" class="hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" aria-controls="sub-menu-2" aria-expanded="false">
        <svg class="text-gray-{{ request()->routeIs('admin.tool.*') ? '500' : '400' }} group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
        </svg>
        <span class="flex-1">{{ __('Tools') }}</span>
        <svg :class="[open ? 'text-gray-400 rotate-90' : 'text-gray-300']" class="ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
        </svg>
    </button>
    <div class="space-y-1" x-show="open">
        @can('bulk_create_sale')
        <x-nav.sub-link href="{{ route('admin.tool.bulk-sales-importer') }}" :active="request()->routeIs('admin.tool.bulk-sales-importer')">{{ __('Bulk Sales Importer') }}</x-nav.sub-link>
        @endcan
        @can('view_setting')
        <x-nav.sub-link href="{{ route('admin.tool.setting.index') }}" :active="request()->routeIs('admin.tool.setting.*')">{{ __('Settings') }}</x-nav.sub-link>
        @endcan
        @can('view_offer')
        <x-nav.sub-link href="{{ route('admin.tool.offer.index') }}" :active="request()->routeIs('admin.tool.offer.*')">{{ __('Offers') }}</x-nav.sub-link>
        @endcan
    </div>
</div>
@endif