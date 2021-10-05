<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/e2f5225a3c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <link rel="icon" type="image/x-icon" href="http://esquel.org.ec/templates/g5_hydrogen/custom/images/logos/Logo%20Esquel%20favicon.svg">
        <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
        />
    </head>
    <!-- max-w-7xl mx-auto  -->
    <body class="pb-56 min-h-screen bg-gray-200 dark:bg-gray-900 font-sans transition-all duration-300">
        <x-jet-banner />

        <x-nav-guest/>
        @if (isset($header))
        <div class="w-full bg-white dark:bg-gray-800 shadow border-b dark:border-gray-700">
            <div class="py-6 max-w-7xl w-full m-auto">
                {{ $header }}
            </div>
        </div>
        @endif

        <div class="max-w-7xl mx-auto flex justify-end">
            <button onclick="mode()"
            class="py-2 px-5 border border-gray-500 dark:border-gray-400 rounded m-2 text-gray-300 dark:text-gray-700 bg-gray-900 dark:bg-white transition duration-300 ease-in-out"
            >Mode</button>
        </div>
        
        <div class="w-full py-20">
            <div class="max-w-7xl m-auto">
                @if (isset($content))
                    {{ $content }}
                @endif
                @if (isset($content_footer))
                    {{ $content_footer }}
                @endif
            </div>
        </div>
        
        <x-footer/>
        
        @stack('modals')
        @livewireScripts

        <script src="{{ mix('js/app.js') }}"></script>
        <script>
            window.onload = () => {
                if (!('theme' in localStorage)) {
                    localStorage.setItem('theme', JSON.stringify('light'));
                    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                        document.documentElement.classList.remove('light');
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        document.documentElement.classList.add('light');
                    }
                } else {
                    document.documentElement.classList.remove('light');
                    document.documentElement.classList.add(JSON.parse(localStorage.getItem('theme')));
                }
            }
            function mode() {
                if (!('theme' in localStorage)) {
                    localStorage.setItem('theme', JSON.stringify('light'));
                    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                        document.documentElement.classList.remove('light');
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        document.documentElement.classList.add('light');
                    }
                } else {
                    if (JSON.parse(localStorage.getItem('theme')) == 'dark'){ 
                        document.documentElement.classList.add('light');
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', JSON.stringify('light'));
                    } else {
                        document.documentElement.classList.add('dark');
                        document.documentElement.classList.remove('light');
                        localStorage.setItem('theme', JSON.stringify('dark'));
                    }
                }
            }
        </script>
    </body>
</html>
