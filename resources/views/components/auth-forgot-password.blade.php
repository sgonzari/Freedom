<div class="card">
    <x-application-logo :class="'card__logo'"/>
    @if (!session('status'))
        <p class="card__description">
            {{ __('auth.Forgot Password Text') }}
        </p>
    @endif
    <!-- Validation Errors -->
    <x-auth-validation-errors class="card__error" :errors="$errors" />
    <div class="card__main">
        <form class="card__main--form" method="POST" action="{{ route('password.email') }}">
            @if (!session('status'))
                @csrf
                <div class="card__form--element">
                    <label class="card__element--label" for="email">{{ __('auth.Email') }}: </label>
                    <input class="card__element--input" id="email" name="email" type="email" placeholder="{{ __('auth.Email') }}" maxlength="255" required autofocus />
                </div>
            @else
                <div class="card__form--element">
                    <p class="card__element--confirm">
                        {{ __('auth.Confirm Forgot Password Sent') }}
                    </p>
                </div>
            @endif
            <div class="card__form--buttons">
                @if (!session('status'))
                    <a class="card__button card__button--back" href="{{ route('index') }}">
                        {{ __('auth.Back') }}
                    </a>
                    <button class="card__button card__button--send">
                        {{ __('auth.Send') }}
                    </button>
                @else
                    <a class="card__button card__button--sent" href="{{ route('index') }}">
                        {{ __('auth.Back') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>