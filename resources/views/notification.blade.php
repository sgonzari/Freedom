<x-app-layout>
    <x-slot name="title">{{ __('notification.Notifications') }}</x-slot>

    <x-slot name="header">
        <h2 class="main__header--title">{{ __('notification.Notifications') }}</h2>
    </x-slot>

    <livewire:notification-component/>
</x-app-layout>