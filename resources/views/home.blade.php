<x-app-layout>
    <x-slot name="title">{{ __('home.Home') }}</x-slot>
    
    <x-slot name="header">
        <h2 class="main__header--title">{{ __('home.Home') }}</h2>
    </x-slot>
    
    <livewire:post-create/>
    <livewire:home-component/>
</x-app-layout>