<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Sebastián González Ríos">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Freedom') }} - {{ $title }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/favicon.ico') }}">

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Underscore -->
        <script src="https://cdn.jsdelivr.net/npm/underscore@1.13.3/underscore-umd-min.js"></script>

        <!-- Canvas JS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <div class="body__app">
            <header class="header"> 
                <div class="header__top">
                    <x-application-logo :class="'header__logo'" href="{{ route('home') }}"/>
                    <x-application-nav class="header__nav"/>
                </div>
                <div class="header__bottom">
                    <x-application-profile class="header__profile"/>
                </div>
            </header>
            <main class="main main--admin">
                <div class="main__header">
                    {{ $header }}
                </div>
                <div class="main__container">
                    {{ $slot }}
                </div>
            </main>
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html>
