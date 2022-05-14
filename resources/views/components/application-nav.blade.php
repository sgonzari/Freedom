<nav {{ $attributes }}>
    <div id="navMore" class="header__nav--more">
        <div class="header__more">
            <svg class="header__more--signal"viewBox="0 0 24 24" aria-hidden="true">
                <g>
                    <path d="M12.538 6.478c-.14-.146-.335-.228-.538-.228s-.396.082-.538.228l-9.252 9.53c-.21.217-.27.538-.152.815.117.277.39.458.69.458h18.5c.302 0 .573-.18.69-.457.118-.277.058-.598-.152-.814l-9.248-9.532z">
                    </path>
                </g>
            </svg>
            <a class="header__more--admin" href="{{ route('admin') }}"> Menú administración</a>
        </div>
    </div>

    <x-nav-link class="header__nav--element" :href="route('home')" :active="request()->routeIs('home')">
        <span class="nav__element--icon material-symbols-rounded"> home </span>
        <h2 class="nav__element--text">{{ _('Home') }}</h2>
    </x-nav-li>
    <x-nav-link class="header__nav--element" :href="route('profile', Auth::user()->username)" :active="request()->routeIs('profile', Auth::user()->username)">
        <span class="nav__element--icon material-symbols-rounded"> perm_identity </span>
        <h2 class="nav__element--text">{{ _('Profile') }}</h2>
    </x-nav-link>
    <x-nav-link class="header__nav--element header__nav--notification" :href="route('notification')" :active="request()->routeIs('notification')">
        @if (Auth::user()->notifications()->get()->where("watched", false)->count())
            <div class="nav__element--alert"></div>
        @endif
        <span class="nav__element--icon material-symbols-rounded"> notifications_none </span>
        <h2 class="nav__element--text">{{ _('Notification') }}</h2>
    </x-nav-link>
    <x-nav-link class="header__nav--element" :href="route('bookmark')" :active="request()->routeIs('bookmark')">
        <span class="nav__element--icon material-symbols-rounded"> bookmark_border </span>
        <h2 class="nav__element--text">{{ _('Bookmark') }}</h2>
    </x-nav-link>
    <div id="navButton" class="header__nav--element">
        <span class="nav__element--icon material-symbols-rounded"> more_horiz </span>
        <h2 class="nav__element--text">{{ _('More') }}</h2>
    </div>
</nav>