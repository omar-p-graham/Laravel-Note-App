<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Omar P Graham">
        <meta name="description" content="A simple note application made with Laravel">
        <link rel="icon" href="http://127.0.0.1:8000/images/note-logo.png" type="image/icon">
        <title>Note Application</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
         <!-- Scripts -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="w-full min-h-screen overflow-x-hidden font-sans antialiased text-gray-900 bg-gray-200 dark:bg-gray-900 dark:text-white">
        <main class="grid w-full h-screen p-7 align-items-center place-items-center">
            <div class="">
                <div class="w-24 h-24 mx-auto mb-6">
                    <x-application-logo></x-application-logo>
                </div>
                <div class="">
                    <h2 class="mb-3 text-lg font-semibold text-center">Welcome to my simple Note Application</h2>
                    <p class="text-center">This application can be used for creating, organizing and storing your digital notes.</p>
                </div>
                @if (Route::has('login'))
                    <div class="flex justify-between">
                        <div class="p-3 text-center">
                            <small class="block my-3">Already registered?</small>
                            <a
                                href="{{ route('login') }}"
                                class="px-10 py-2 text-black transition-all border-2 border-black rounded-md hover:text-white hover:bg-black dark:hover:bg-white dark:hover:text-black dark:text-white dark:border-white"
                            >
                                Log in
                            </a>
                        </div>
                        <div class="p-3 text-center">
                            <small class="block my-3">Not yet registered?</small>
                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="px-10 py-2 text-black transition-all border-2 border-black rounded-md hover:text-white hover:bg-black dark:hover:bg-white dark:hover:text-black dark:text-white dark:border-white"
                                >
                                    Register
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </main>

        <footer class="py-4 text-sm text-center border-t">
            Omar P Graham
        </footer>
    </body>
</html>
