<!-- Session Status -->
<x-auth-session-status class="card__status" :status="session('status')" />

<div class="card">
    <x-application-logo :class="'card__logo'"/>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="card__error" :errors="$errors" />
    <div class="card__main">
        <form class="card__main--form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card__form--element">
                <label class="card__element--label" for="username">{{ __('auth.Username') }}: </label>
                <input class="card__element--input" id="username" name="username" type="text" placeholder="{{ __('auth.username') }}" required />
            </div>
            <div class="card__form--element">
                <label class="card__element--label" for="password">{{ __('auth.Password') }}: </label>
                <input class="card__element--input" id="password" name="password" type="password" placeholder="********" required />
            </div>
            <div class="card__form--buttons">
                <a class="card__button card__button--register" href="{{ route('register') }}">
                    {{ __('auth.Register') }}
                </a>
                <button class="card__button card__button--login">
                    {{ __('auth.Login') }}
                </button>
            </div>
            @if (Route::has('password.request'))
                <div class="card__form--forgotPassword">
                    <a class="card__forgotPassword" href="{{ route('password.request') }}">
                        {{ __('auth.Forgot your password?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>