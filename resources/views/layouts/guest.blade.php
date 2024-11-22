<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0  dark:bg-gray-900">
        {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> --}}

            @if (Route::is('register'))
            <div class="mt-28 ml-8">
                <h1 class="text-slate-900 font-medium sm:text-5xl lg:text-4xl tracking-tight text-center">
                    Bienvenue sur Task<span class="text-[#B784B7]">Geek</span>
                </h1>
                <p class="mt-6 text-lg text-slate-600 text-center max-w-3xl pb-4 mx-auto">
                    Créez un compte pour profiter de fonctionnalités exclusives, et rester connecté à vos projets
                </p>
            </div>
        @elseif (Route::is('login'))
            <div class="mt-28 ml-8">
                <h1 class="text-slate-900 font-medium sm:text-5xl lg:text-4xl tracking-tight text-center">
                    Connexion à votre compte
                </h1>
                <p class="mt-6 text-lg text-slate-600 text-center max-w-3xl pb-4 mx-auto">
                    Vous n'avez pas encore de compte ? <a href="{{ route('register') }}" class="text-[#B784B7] hover:underline">Créez-en un ici</a>.
                </p>
            </div>
        @endif
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg ml-5">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
