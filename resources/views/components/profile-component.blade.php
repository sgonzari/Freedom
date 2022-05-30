<div>
    @if (is_null($user))
        <div class="empty">
            <h1 class="empty__text">{{ __('profile.This account doesnt exist') }}</h1>
        </div>
    @else
        @livewire('profile-info', ['user' => $user, 'option' => $option])

        @if (Auth::user()->posts()->where('pinged', 1)->first())
            @livewire('profile-pin', ['user' => $user])
        @endif

        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                @livewire('post-component', ['post' => $post], key($post->id_post))
            @endforeach
        @else
        <div class="empty">
            <h1 class="empty__text">
            @switch ($option)
                @case('posts')
                    {{ __('profile.This account hasnt post') }}
                    @break
                @case('reposts')
                    {{ __('profile.This account hasnt repost') }}
                    @break
                @case('likes')
                    {{ __('profile.This account hasnt likes') }}
                    @break
            @endswitch
            </h1>
        </div>
        @endif
    @endif
</div>