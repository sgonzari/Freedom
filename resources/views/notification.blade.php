<x-app-layout>
    <x-slot name="title">{{ __('Notification') }}</x-slot>

    <x-slot name="header">
        <h2 class="main__header--title">{{ __('Notification') }}</h2>
    </x-slot>

    <livewire:post-notification/>
</x-app-layout>