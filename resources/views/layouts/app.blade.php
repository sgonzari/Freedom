<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Sebastián González Ríos">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Freedom') }} - {{ $title }}</title>

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        @if (Auth::user()->warnings()->where('opened', false)->count() > 0)
            @livewire('warning-view-user', ['user' => Auth::user()])
        @endif
        <div class="body__app">
            <header class="header"> 
                <div class="header__top">
                    <x-application-logo :class="'header__logo'" href="{{ route('home') }}"/>
                    <x-application-nav class="header__nav"/>
                </div>
                <div class="header__bottom">
                    <livewire:application-profile />
                </div>
            </header>
            <main class="main" id="main">
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
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html>
