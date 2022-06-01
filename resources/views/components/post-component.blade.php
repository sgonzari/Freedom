<div>
    <div class="post">
        @if (request()->routeIs('home'))
            @if ((array_key_exists($post->id_post, $infoPost)) AND ($infoPost[$post->id_post] == "repost"))
                <a class="post__from" href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
                    <span class="post__from--content">{{ __('post.repost by') }} {{ App\Models\Repost::where('fk_post', $post->id_post)->orderBy('created_at')->first()->user()->first()->username }}</span>
                </a>
            @else
                @if ((array_key_exists($post->id_post, $infoPost)) AND ($infoPost[$post->id_post] == "like"))
                    <a class="post__from" href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
                        <span class="post__from--content">{{ __('post.liked by') }} {{ App\Models\Like::where('fk_post', $post->id_post)->orderBy('created_at')->first()->user()->first()->username }}</span>
                    </a>
                @else 
                    @if (!is_null($post->fk_post))
                        <a class="post__from" href="{{ route('post', ['username' => App\Models\Post::withTrashed()->where('id_post', $post->fk_post)->first()->user()->first()->username, 'id_post' => App\Models\Post::withTrashed()->where('id_post', $post->fk_post)->first()->id_post]) }}">
                            <span class="post__from--content">{{ __('post.replied to') }} {{ App\Models\Post::withTrashed()->where('id_post', $post->fk_post)->first()->user()->first()->username }}</span>
                        </a>
                    @endif
                @endif
            @endif
        @endif
        <div class="post__container">
            <a class="post__profile" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
                <img loading="lazy" src="{{ asset('storage/'.$post->user()->first()->profile_image) }}" alt="{{ __('image.Profiles image') }}" class="post__profile--image" />
            </a>
            <div class="post__main">
                <div class="post__main--header">
                    <div class="post__header">
                        <a class="post__header--info" href="{{ route('profile', ['username' => $post->user()->first()->username]) }}">
                            <span class="post__header--name">{{ $post->user()->first()->name }}</span>
                            <span class="post__header--username">{{ __('@') }}{{ $post->user()->first()->username }}</span>
                        </a>
                        @livewire('post-modal', ['post' => $post])
                    </div>
                </div>
                <div class="post__main--body">
                    <a class="post__body--content" href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">
                        <p class="post__content--text">{!!  nl2br(e($post->content)) !!}</p>
                    </a>
                    @if (!is_null($post->image))
                        @livewire('image-component', ['post' => $post])
                    @endif
                </div>
                <div class="post__main--footer">
                    @livewire('post-modal-comment', ['post' => $post])
                    @livewire('repost-status', ['post' => $post])
                    @livewire('like-status', ['post' => $post])
                    @livewire('post-modal-publish', ['post' => $post])
                </div>
            </div>
        </div>
    </div>
</div>