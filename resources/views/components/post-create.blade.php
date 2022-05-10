<div class="main__container--input">
    <form class="main__input--form" wire:submit.prevent="store">
        <div class="main__form">
            <img class="main__form--image" src="" alt=""/>
            <input class="main__form--input" type="text" placeholder="What's happening?" wire:model.defer="content"/>
        </div>
        <button class="main__input--submit" type="submit">Postear</button>
    </form>
</div>