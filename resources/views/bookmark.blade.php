<x-app-layout>
    <x-slot name="title">{{ __('Bookmark') }}</x-slot>

    <x-slot name="header">
    <h2 class="main__header--title">{{ __('Bookmark') }}</h2>

    </x-slot>

    <livewire:post-bookmark/>
</x-app-layout>