<div class="card">
<x-application-logo :class="'card__logo'" href="{{ route('home') }}"/>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="card__error" :errors="$errors" />
    <div class="card__main">
        <form class="card__main--form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card__form--element">
                <label class="card__element--label" for="name">Name: </label>
                <input class="card__element--input" id="name" name="name" type="text" placeholder="name" required />
            </div>
            <div class="card__form--element">
                <label class="card__element--label" for="username">Username: </label>
                <input class="card__element--input" id="username" name="username" type="text" placeholder="username" required />
            </div>
            <div class="card__form--element">
                <label class="card__element--label" for="birthday">Birthday: </label>
                <input class="card__element--input" id="birthday" name="birthday" type="date" placeholder="birthday" />
            </div>
            <div class="card__form--element">
                <label class="card__element--label" for="email">Email: </label>
                <input class="card__element--input" id="email" name="email" type="email" placeholder="email@domain.es" required />
            </div>
            <div class="card__form--element">
                <label class="card__element--label" for="email_confirmation">Confirm email: </label>
                <input class="card__element--input" id="email_confirmation" name="email_confirmation" type="email" placeholder="email@domain.es" required />
            </div>
            <div class="card__form--element">
                <label class="card__element--label" for="password">Password: </label>
                <input class="card__element--input" id="password" name="password" type="password" placeholder="********" required />
            </div>
            <div class="card__form--element">
                <label class="card__element--label" for="password_confirmation">Password: </label>
                <input class="card__element--input" id="password_confirmation" name="password_confirmation" type="password" placeholder="********" required />
            </div>
            <div class="card__form--buttons">
                <a class="card__button card__button--back" href="{{ route('index') }}">
                    {{ __('Back') }}
                </a>
                <button class="card__button card__button--register">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
