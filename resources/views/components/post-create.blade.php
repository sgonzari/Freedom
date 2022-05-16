<div class="main__container--input">
    <form class="main__input--form" wire:submit.prevent="store">
        <div class="main__form">
            <div class="main__form--image">
                <img class="form__image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}" alt="Image profile"/>
            </div>
            <input class="main__form--input" type="text" placeholder="What's happening?" wire:model="content"/>
        </div>
        <button class="main__input--submit @if (!$content) disabled @endif" type="submit" @if (!$content) disabled @endif>Postear</button>
    </form>
</div>