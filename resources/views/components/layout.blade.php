<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Company Inc - {{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet" />
</head>

<body class="font-sans antialiased">
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex flex-1">
                    <a href="/" class="-m-1.5 p-1.5">
                        <svg class="float-left w-10 pr-2 fill-blue-500" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50" />
                        </svg>
                        <span class="font-bold italic relative top-1">Company Inc</span>
                    </a>
                </div>
                <div class="flex gap-x-12">
                    @if (Route::has('register'))
                        <a href="{{ route('index') }}" class="text-sm font-semibold leading-6 text-gray-900">
                            Home
                        </a>
                        <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-gray-900">
                            Register
                        </a>
                    @endif
                </div>
            </nav>
        </header>
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
