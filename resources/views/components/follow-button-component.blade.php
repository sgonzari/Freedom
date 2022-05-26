<div class="follow__button">
    @if (Auth::user()->id_user != $user->id_user)
        @if (Auth::user()->followings()->find($user->id_user))
            <button class="follow__button--element follow__button--unfollow" wire:click="unfollowUser">{{ __('profile.Unfollow') }}</button>
        @else
            <button class="follow__button--element follow__button--follow" wire:click="followUser">{{ __('profile.Follow') }}</button>
        @endif
    @endif
</div>
