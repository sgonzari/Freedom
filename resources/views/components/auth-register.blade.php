<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
    </div>

    <!-- Username -->
    <div class="mt-4">
        <x-label for="username" :value="__('Username')" />

        <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
    </div>

    <!-- Confirm Email Address -->
    <div class="mt-4">
        <x-label for="email_confirmation" :value="__('Confirm Email')" />

        <x-input id="email_confirmation" class="block mt-1 w-full" type="email" name="email_confirmation" required />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required />
    </div>

    <div class="flex items-center justify-between mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('index') }}">
            {{ __('Back') }}
        </a>

        <x-button-submit class="ml-4">
            {{ __('Register') }}
        </x-button-submit>
    </div>
</form>
