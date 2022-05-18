<div class="main__container--input">
    <form class="main__input--form" wire:submit.prevent="store">
        <div class="main__form">
            <div class="main__form--image">
                <img class="form__image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}" alt="Image profile"/>
            </div>
            <div class="main__form--container">
                <input class="main__container--input" type="text" placeholder="What's happening?" wire:model="content"/>
                @if ($image)
                    <div class="main__container--image">
                        <span class="main__icon material-symbols-rounded" wire:click="$set('image', '')"> close </span>
                        <img class="main__image" src="{{ $image->temporaryUrl() }}" alt="Imagen subida">
                    </div>
                @endif
            </div>
        </div>
        <div class="main__buttons">
            <div class="main__button--container">
                <input class="main__button--element" type="file" wire:model="image" />
                @error($image)
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="main__button--submit @if (!$content) disabled @endif" type="submit" @if (!$content) disabled @endif wire:target="image">Postear</button>
        </div>
    </form>
</div>