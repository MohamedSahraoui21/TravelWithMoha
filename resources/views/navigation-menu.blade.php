<nav x-data="{ open: false }"
    class="bg-blue-800 text-white to-indigo-600 border-b border-gray-100 fixed w-full z-10 top-0">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex sm:ms-10">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="text-white">
                        <i class="fas fa-home"></i> &nbsp; {{ __('Home') }}
                    </x-nav-link>



                    @auth
                        @if (Auth::user()->isAdmin == 'SI')
                            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-white">
                                <i class="fas fa-tachometer-alt"></i> &nbsp; {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.*')" class="text-white">
                                <i class="fas fa-pen"></i> &nbsp; {{ __('Posts') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('packs.index') }}" :active="request()->routeIs('packs.*')" class="text-white">
                                <i class="fas fa-sliders"></i> &nbsp; {{ __('Gestion Packs') }}
                            </x-nav-link>
                        @endif
                    @endauth

                    <x-nav-link href="{{ route('packsPublic.index') }}" :active="request()->routeIs('packsPublic.index.*')" class="text-white">
                        <i class="fas fa-plane"></i> &nbsp; {{ __('Packs') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('contactanos.index') }}" :active="request()->routeIs('contactanos.*')" class="text-white">
                        <i class="fas fa-envelope"></i> &nbsp; {{ __('Contáctanos') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @auth
                    <!-- Dropdown Menu -->
                    <div class="relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ Auth::user()->name }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <!-- Authentication Links -->
                    @if (Route::has('login'))
                        <div class="ml-4 text-sm">
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold text-gray-200 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        </div>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">


            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="text-white">
                <i class="fas fa-home"></i> &nbsp; {{ __('Home') }}
            </x-responsive-nav-link>



            @auth
                @if (Auth::user()->isAdmin == 'SI')
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-white">
                        <i class="fas fa-tachometer-alt"></i> &nbsp; {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.*')" class="text-white">
                        <i class="fas fa-pen"></i> &nbsp; {{ __('Posts') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('packs.index') }}" :active="request()->routeIs('packs.*')" class="text-white">
                        <i class="fas fa-sliders"></i> &nbsp; {{ __('Gestion Packs') }}
                    </x-responsive-nav-link>
                @endif
            @endauth

            <x-responsive-nav-link href="{{ route('packsPublic.index') }}" :active="request()->routeIs('packsPublic.index.*')" class="text-white">
                <i class="fas fa-plane"></i> &nbsp; {{ __('Packs') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('contactanos.index') }}" :active="request()->routeIs('contactanos.*')" class="text-white">
                <i class="fas fa-envelope"></i> &nbsp; {{ __('Contáctanos') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <!-- User Profile Dropdown -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif
                    <div>
                        <div class="font-medium text-base text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="text-white">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')"
                            class="text-white">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                            class="text-white">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
