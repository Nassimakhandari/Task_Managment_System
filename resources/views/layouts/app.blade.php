<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src=" https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</head>

<body>
    <div class="flex items-center justify-between mx-14 my-3">
        <!-- Logo -->
        <div class="flex items-center">
            <h1 class="text-[25px] font-bold">Task<span class="text-[#B784B7]">Geek</span></h1>
        </div>

        <!-- Navigation -->
        @if (request()->is('/'))
            <!-- Accueil (Welcome Page) Navigation -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}"
                    class="px-6 py-2 bg-[#B784B7] text-white rounded-lg hover:bg-[#9f5e7a]">Log In</a>
                <a href="{{ route('register') }}"
                    class="px-6 py-2 bg-[#B784B7] text-white rounded-lg hover:bg-[#9f5e7a]">Register</a>
            </div>
        @else
            <!-- Tableau de bord (Dashboard) Navigation -->
            <div class="flex justify-between gap-96 items-center">
                {{-- <div class="relative w-72">
                    <input 
                        class="w-full border-[#B784B7] rounded-md pl-10 pr-4 py-2 border-2 focus:outline-none focus:ring-2 focus:ring-[#B784B7] placeholder-[#B784B7]" 
                        type="search" 
                        placeholder="Search..." 
                    >
                    <span class="absolute inset-y-0 left-2 flex items-center text-[#B784B7]">
                        <i class="fas fa-search"></i>
                    </span>
                </div> --}}
                
                <div class="flex items-center space-x-6 text-[#B784B7]">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-base leading-4 font-semibold rounded-md text-[#B784B7] dark:text-gray-400 bg-white dark:bg-gray-800  dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    @if (Auth::check())
                                        <div>{{ Auth::user()->name }}</div>
                                    @endif
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content" class="text-[#B784B7]">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-[#B784B7] hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-[#B784B7] dark:text-gray-200">
                    @if (Auth::check())
                        <div>{{ Auth::user()->name }}</div>
                    @endif
                </div>
                <div class="font-medium text-sm text-gray-500">
                    @if (Auth::check())
                        <div>{{ Auth::user()->email }}</div>
                    @endif
                </div>
            </div>

            <div class="mt-3 space-y-1 text-[#B784B7]">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    </div>
    @endif

    </div>

    @yield('content') <!-- La hero section s'affichera ici -->
</body>

</html>
