<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TravelWithMoha</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- CDN SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CDN fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    @if (session('mensaje'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('mensaje') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
</body>
<footer class="bg-blue-800 text-white mt-8">

    <div class="py-8">
        <div class="container mx-auto text-center">
            <div class="mb-4">
                <img src="{{ Storage::url('pngLogo.png') }}" alt="Logo" style="height: 100px; margin-bottom: 10px;"
                    class="mx-auto">
                <p class="text-lg">Copyright © 2024 | TravelWithMoha.com</p>
            </div>
            <div class="mb-4">
                <a href="http://creativecommons.org/licenses/by-nc-nd/4.0/?ref=chooser-v1" target="_blank"
                    rel="license noopener noreferrer" class="text-white hover:text-gray-400">
                    Licensed under CC BY-NC-ND 4.0

                </a>
            </div>
            <div class="flex justify-center space-x-4">
                <a href="https://www.facebook.com/mohamedSh21/" class="text-white hover:text-gray-400"
                    target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="https://www.youtube.com/channel/UCZ0xgxvuaTnmkrO0UudfgCA"
                    class="text-white hover:text-gray-400" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
                <a href="https://www.instagram.com/" class="text-white hover:text-gray-400" target="_blank"><i
                        class="fab fa-instagram fa-2x"></i></a>
                <a href="https://www.linkedin.com/in/mohamed-sahraoui-1a4928293/" class="text-white hover:text-gray-400"
                    target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
            </div>
        </div>
    </div>
</footer>

</html>
