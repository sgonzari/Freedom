<x-app-layout>
    <x-slot name="title">{{ __('Notification') }}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification') }}
        </h2>
    </x-slot>

    <livewire:post-notification/>
</x-app-layout>