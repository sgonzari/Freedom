<x-app-layout>
    <x-slot name="title">{{ __('Home') }}</x-slot>
    
    <x-slot name="header">
        <h2 class="main__header--title">{{ __('Home') }}</h2>
    </x-slot>
    
    <livewire:post-create/>
    <livewire:home-component/>
</x-app-layout>