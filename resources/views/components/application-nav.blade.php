<nav {{ $attributes }}>
    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
        <span class="nav__element--icon material-symbols-rounded"> home </span>
        <h2 class="nav__element--text">{{ _('Home') }}</h2>
    </x-nav-li>
    <x-nav-link :href="route('profile', Auth::user()->username)" :active="request()->routeIs('profile', Auth::user()->username)">
        <span class="nav__element--icon material-symbols-rounded"> perm_identity </span>
        <h2 class="nav__element--text">{{ _('Profile') }}</h2>
    </x-nav-link>
    <x-nav-link :href="route('notification')" :active="request()->routeIs('notification')">
        <span class="nav__element--icon material-symbols-rounded"> notifications_none </span>
        <h2 class="nav__element--text">{{ _('Notification') }}</h2>
    </x-nav-link>
    <x-nav-link :href="route('bookmark')" :active="request()->routeIs('bookmark')">
        <span class="nav__element--icon material-symbols-rounded"> bookmark_border </span>
        <h2 class="nav__element--text">{{ _('Bookmark') }}</h2>
    </x-nav-link>
    <x-nav-link>
        <span class="nav__element--icon material-symbols-rounded"> more_horiz </span>
        <h2 class="nav__element--text">{{ _('More') }}</h2>
    </x-nav-link>
</nav>