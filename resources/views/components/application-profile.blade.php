<div {{ $attributes }}>
    <div id="profileOptions" class="header__profile--options">
        <div class="header__option">
            <svg class="header__option--signal"viewBox="0 0 24 24" aria-hidden="true">
                <g>
                    <path d="M12.538 6.478c-.14-.146-.335-.228-.538-.228s-.396.082-.538.228l-9.252 9.53c-.21.217-.27.538-.152.815.117.277.39.458.69.458h18.5c.302 0 .573-.18.69-.457.118-.277.058-.598-.152-.814l-9.248-9.532z">
                    </path>
                </g>
            </svg>
            <a class="header__option--logout" href="{{ route('logout') }}"> Log out {{ __('@') }}{{ Auth::user()->username }}</a>
        </div>
    </div>

    <div id="profileButton" class="header__profile--container">
        <div class="header__profile--image">
            <img class="profile__image" src="http://localhost/freedom/public/storage/{{ Auth::user()->profile_image }}"/>
        </div>
        <div class="header__profile--info">
            <h2 class="header__info--name">{{ Auth::user()->name }}</h2>
            <span class="header__info--username">{{ __('@') }}{{ Auth::user()->username }}</span>
        </div>
        <div class="header__profile--option">
            <span class="header__option--icon material-symbols-rounded"> more_horiz </span>
        </div>
    </div>
    <script>
        var modal = document.getElementById("profileOptions");
        var btn = document.getElementById('profileButton');
    
        btn.onclick = function () {
            modal.style.display = "block";
        }
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</div>
