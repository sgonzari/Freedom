<x-app-layout>
    <x-slot name="title">{{ __('Admin') }}</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <livewire:admin-tools/>
</x-app-layout>