<div style="margin: 0 0 50px 0; width: 500px; border: 1px solid black">
    <div style="display:flex; flex-direction:row; justify-content: space-between;">
        <h1>{{ $post->user()->first()->username }}</h1>
        @livewire('post-delete', ['post' => $post], key($post->id_post))
    </div>
    <p> {{ $post->content }}</p>
    <div style="display:flex; flex-direction:row; justify-content: space-around;">
        <a href="{{ route('post', ['username' => $post->user()->first()->username, 'id_post' => $post->id_post]) }}">{{ __('Comments') }}</a>
        @livewire('like-status', ['post' => $post], key($post->id_post))
        @livewire('repost-status', ['post' => $post], key($post->id_post))
        @livewire('bookmark-status', ['post' => $post], key($post->id_post))
    </div>
</div>
