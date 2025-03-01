<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            @layer theme {
                :root,
                :host {
                    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
                    --font-serif: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif;
                }
            }
        </style>
    @endif
</head>

<body class="bg-gray-100 h-screen">
<nav class="bg-white shadow-md py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <a href="#" class="text-lg font-bold">Магазин</a>
        <ul class="flex items-center space-x-4">
            <li>
                <a href="{{ route('products.index')  }}" class="text-gray-600 hover:text-gray-900 transition duration-300">Товары</a>
            </li>
            <li>
                <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Заказы</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mx-auto p-4 mt-4">
    @yield('content')
</div>
</body>
</html>
