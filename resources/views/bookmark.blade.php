<x-app-layout>
    <x-slot name="title">{{ __('bookmark.Bookmarks') }}</x-slot>

    <x-slot name="header">
    <h2 class="main__header--title">{{ __('bookmark.Bookmarks') }}</h2>

    </x-slot>

    <livewire:post-bookmark/>
</x-app-layout>