<x-admin-layout>
    <x-slot name="title">{{ __('Admin Panel') }}</x-slot>

    <x-slot name="header">
        <h2 class="main__header--title">{{ __('Admin Panel') }}</h2>
    </x-slot>

    <livewire:admin-tools/>
</x-admin-layout>