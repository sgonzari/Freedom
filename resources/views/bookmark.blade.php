<x-app-layout>
    <x-slot name="title">{{ __('Bookmark') }}</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookmark') }}
        </h2>
    </x-slot>

    <livewire:post-bookmark/>
</x-app-layout>