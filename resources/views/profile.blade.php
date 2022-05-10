<x-app-layout>
    <x-slot name="title">{{ __('Profile') }}</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <livewire:profile-component :user="$user"/>
</x-app-layout>