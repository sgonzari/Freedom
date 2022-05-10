<x-app-layout>
    <x-slot name="title">{{ __('Post') }}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (isset($user)) 
                {{ __('Post') }} {{ $post->id_post }} of {{ $user->username }}
            @else
                @if (isset($post))
                    {{ __('Post_deleted') }}
                @else
                    {{ __('Non-Existent Post') }}
                @endif
            @endif
        </h2>
    </x-slot>

    @if (isset($user)) 
        <livewire:post-view :post="$post" :user="$user"/>
    @else
        @if (isset($post))
            <h1>Este post ha sido eliminado</h1>
        @else
            <h1>Este post no existe</h1>
        @endif
    @endif
</x-app-layout>