<x-app-layout>
    <x-slot name="title">{{ __('Home') }}</x-slot>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
        <livewire:post-create/>
    </x-slot>

    <livewire:home-component/>
</x-app-layout>