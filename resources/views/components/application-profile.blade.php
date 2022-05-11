<div {{ $attributes }}>
    <img class="header__profile--image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}"/>
    <div class="header__profile--info">
        <h2 class="header__info--name">{{ Auth::user()->name }}</h2>
        <span class="header__info--username">{{ __('@') }}{{ Auth::user()->username }}</span>
    </div>
    <div class="header__profile--option">
        <span class="header__option--icon material-symbols-rounded"> more_horiz </span>
    </div>
</div>