<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }} {{ $post->id_post }} of {{ $user->username }}
        </h2>
    </x-slot>

    <livewire:post-view :post="$post" :user="$user"/>
</x-app-layout>