<x-admin-layout>
    <x-slot name="title">{{ __('admin.adminPanel') }}</x-slot>

    <x-slot name="header">
        <h2 class="main__header--title">{{ __('admin.adminPanel') }}</h2>
    </x-slot>

    <livewire:admin-tool/>
</x-admin-layout>