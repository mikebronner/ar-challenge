<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        >
        <meta
            name="csrf-token"
            content="{{ csrf_token() }}"
        >

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link
            rel="stylesheet"
            href="https://rsms.me/inter/inter.css"
        >
        <link
            href="{{ asset('css/app.css') }}"
            rel="stylesheet"
        >
    </head>

    <body>
        <div id="app">
            <div>
                <div class="bg-gray-800 pb-32">
                    <header class="py-10">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <h1 class="text-3xl leading-9 font-bold text-white">
                                Internet Breaking Bad Database (IBBDB)
                            </h1>
                        </div>
                    </header>
                </div>

                <main class="-mt-32">
                    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
                        <!-- Replace with your content -->
                        <div class="bg-white rounded-lg shadow px-5 py-6 sm:px-6">
                            <main class="py-4">
                                @yield('content')
                            </main>
                        </div>
                        <!-- /End replace -->
                    </div>
                </main>
            </div>
        </div>
        <script
            src="{{ asset('js/app.js') }}"
            defer
        ></script>
    </body>
</html>
