<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (!is_null($user))
                {{ __('Profile of') }} {{ $user->name }}
            @else
                {{ __('Non-Existent User') }}
            @endif
        </h2>
    </x-slot>

    @if (!is_null($user))
        <livewire:post-user :user="$user"/>
    @endif
</x-app-layout>