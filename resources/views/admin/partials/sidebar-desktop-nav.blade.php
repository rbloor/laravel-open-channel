<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">

    <!-- Sidebar component -->
    <div class="flex flex-col flex-grow border-r border-gray-200 pt-4 bg-white overflow-y-auto">

        <!-- Desktop Logo -->
        <div class="flex items-center flex-shrink-0 px-4">
            <img class="h-5 w-auto" src="{{ asset('img/canon-logo.png') }}" alt="Canon Open Channel" />
        </div>

        <!-- Desktop Nav -->
        <div class="pt-5 pb-4 flex-grow flex flex-col">
            <nav class="flex-1 px-2 space-y-1 bg-white" aria-label="Sidebar">
                @include('admin.partials.sidebar-menu')
            </nav>
        </div>

        <!-- Profile Block -->
        <div class="flex-shrink-0 flex border-t border-gray-200 px-4 py-3">
            <a href="{{ route('profile.show') }}" class="flex-shrink-0 w-full group block">
                <div class="flex items-center">
                    <div>
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">{{ Auth::user()->name }}</p>
                        <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">View profile</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>