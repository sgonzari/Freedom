<!-- Session Status -->
<x-auth-session-status class="card__status" :status="session('status')" />

<div class="card">
    <x-application-logo :class="'card__logo'"/>
    <p class="card__description">
        {{ __('auth.Forgot Password Text') }}
    </p>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="card__error" :errors="$errors" />
    <div class="card__main">
        <form class="card__main--form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card__form--element">
                <label class="card__element--label" for="email">{{ __('auth.Email') }}: </label>
                <input class="card__element--input" id="email" name="email" type="email" placeholder="{{ __('auth.Email') }}" required autofocus />
            </div>
            <div class="card__form--buttons">
                <a class="card__button card__button--back" href="{{ route('index') }}">
                    {{ __('auth.Back') }}
                </a>
                <button class="card__button card__button--send">
                    {{ __('auth.Send') }}
                </button>
            </div>
        </form>
    </div>
</div>