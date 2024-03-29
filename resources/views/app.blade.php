<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/favicon.png" type="image/png" />

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased bg-gradient-to-r from-[#0057b7] to-[#ffd700]">
        @inertia

        <!-- TTS -->
        <script src="https://code.responsivevoice.org/responsivevoice.js?key=ATIzEWvD"></script>

        <script lang="ts">
            window.environment = '{{ app()->environment() }}';
        </script>
    </body>
</html>
