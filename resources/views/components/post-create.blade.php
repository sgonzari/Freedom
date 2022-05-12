<div class="main__container--input">
    <form class="main__input--form" wire:submit.prevent="store">
        <div class="main__form">
            <div class="main__form--image">
                <img class="form__image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}" alt="Image profile"/>
            </div>
            <input class="main__form--input" type="text" placeholder="What's happening?" wire:model.defer="content"/>
        </div>
        <button class="main__input--submit" type="submit">Postear</button>
    </form>
</div>