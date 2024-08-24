{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link rel="preconnect" href="https://fonts.bunny.net">--}}
{{--        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}

{{--        <!-- Scripts -->--}}
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
{{--    </head>--}}
{{--    <body class="font-sans antialiased">--}}
{{--        <div class="min-h-screen bg-gray-100">--}}
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            @isset($header)--}}
{{--                <header class="bg-white shadow">--}}
{{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endisset--}}

{{--            <!-- Page Content -->--}}
{{--            <main>--}}
{{--                {{ $slot }}--}}
{{--            </main>--}}
{{--        </div>--}}
{{--    </body>--}}
{{--</html>--}}
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @stack('css')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{

            background-size: cover;
            background-repeat: no-repeat;
        }
        ul{
            display: flex;
        }
        ul ul{
            display:none;
        }
        ul li:hover ul{
            display: flex;
            flex-direction: column;
            width: auto;
            position: absolute;
            background: #0d6efd;
            top: 40px;
        }
        li {
            padding: 0 15px;
        }
        #navigation-menu a{
            color:#fff!important;
        }

    </style>
</head>

<body class="font-sans antialiased">
<!-- Header -->
<header class="bg-indigo-500 text-white text-center py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">

            <h1 class="mb-0">PROJECT Library</h1>
{{--                        <nav id="navigation-menu" style="display: none;">--}}
{{--                            <ul>--}}
{{--                                <li class="list-inline-item"><a href="{{ route('dashboard') }}" class="text-white">Home</a></li>--}}

{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                        <button id="menu-toggle">Menu--}}
{{--                        </button>--}}
{{--                        <script>--}}
{{--                            document.getElementById('menu-toggle').addEventListener('click', function() {--}}
{{--                                var menu = document.getElementById('navigation-menu');--}}
{{--                                if (menu.style.display === 'none') {--}}
{{--                                    menu.style.display = 'block';--}}
{{--                                } else {--}}
{{--                                    menu.style.display = 'none';--}}
{{--                                }--}}
{{--                            });--}}
{{--                        </script>--}}
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

<!-- Footer -->
<footer class="bg-indigo-600 text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-0">&copy; 2024 PROJECT Library</p>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
@stack('js')
</body>

</html>

