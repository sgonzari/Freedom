<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile of') }} {{ $user }}
        </h2>
    </x-slot>

    <livewire:post-user :user="$user"/>
</x-app-layout>