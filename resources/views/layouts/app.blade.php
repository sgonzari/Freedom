<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Sebastián González Ríos">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Freedom') }} - {{ $title }}</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <header class="header"> 
            <div class="header__top">
                <x-application-logo class="header__logo"/>
                <x-application-nav class="header__nav"/>
            </div>
            <div class="header__bottom">
                <h1>header__bottom</h1>
            </div>
        </header>
        <main class="main">
            <div class="main__header">
                {{ $header }}
            </div>
            <div class="main__container">
                {{ $slot }}
            </div>
        </main>
        <section class="widgets">
            <livewire:search/>
        </section>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html>
