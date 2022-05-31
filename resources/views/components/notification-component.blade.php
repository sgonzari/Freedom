<div>
    @if ($notifications->count() > 0)
        @foreach ($notifications as $notification)
        <div class="notification">
                @if ($notification->fk_typeNot != 5)
                <a class="notification__type" href="{{ route('post', ['username' => $notification->post()->get()->first()->user()->get()->first()->username, 'id_post' => $notification->post()->get()->first()->id_post]) }}">
                    @if ($notification->typeOf()->get()->first()->name == 'like')
                        <span class="notification__type--icon notification__type--like material-symbols-rounded"> favorite_border </span> 
                    @elseif ($notification->typeOf()->get()->first()->name == 'repost')
                        <span class="notification__type--icon notification__type--repost material-symbols-rounded"> repeat </span>
                    @else
                        <span class="notification__type--icon notification__type--default material-symbols-rounded"> chat_bubble </span>
                    @endif
                </a>
                @else
                    <a class="notification__type" href="{{ route('profile', ['username' => $notification->user()->get()->first()->username]) }}">
                        <span class="notification__type--icon notification__type--default material-symbols-rounded"> person_add </span>
                    </a>
                @endif
                <div class="notification__main">
                    <div class="notification__main--header">
                        <a class="notification__header--image" href="{{ route('profile', ['username' => $notification->user()->first()->username]) }}">
                            <img loading="lazy" class="notification__image" src="{{ asset('storage/'.$notification->user()->first()->profile_image) }}" alt="{{ __('image.Profiles image') }}"/>
                        </a>
                        <div class="notification__header--text">
                            <h3 class="notification__text">
                                <a href="{{ route('profile', ['username' => $notification->user()->first()->username]) }}">
                                    <span class="notification__text--username">
                                        {{ $notification->user()->get()->first()->name }} 
                                    </span>
                                </a>
                                @if ($notification->typeOf()->get()->first()->name == 'like')
                                    {{ __('notification.liked your post') }}
                                @elseif ($notification->typeOf()->get()->first()->name == 'repost')
                                    {{ __('notification.reposted your post') }}
                                @elseif ($notification->typeOf()->get()->first()->name == 'comment')
                                    {{ __('notification.comment your post') }}
                                @elseif ($notification->typeOf()->get()->first()->name == 'mention')
                                    {{ __('notification.mentions you') }}
                                @elseif ($notification->typeOf()->get()->first()->name == 'follow')
                                    {{ __('notification.starting follow you') }}
                                @endif
                            </h3>
                            <p class="notification__date">{{ $notification->created_at->format('M-d') }}</p>
                        </div>
                    </div>
                    @if ($notification->fk_typeNot != 5)
                        <a href="{{ route('post', ['username' => $notification->post()->get()->first()->user()->get()->first()->username, 'id_post' => $notification->post()->get()->first()->id_post]) }}">
                            <div class="notification__main--body">
                                <p class="notification__body--text">{!! nl2br(e($notification->post()->first()->content)) !!}</p>
                                @if ($notification->post()->first()->image)
                                    @livewire('image-component', ['post' => $notification->post()->first()], key($notification->post()->first()->id_post))
                                @endif
                            </div>
                        </a>
                        @if (($notification->typeOf()->get()->first()->name != 'like') AND ($notification->typeOf()->get()->first()->name != 'repost'))
                            <div class="notification__main--footer">
                                @livewire('post-modal-comment', ['post' => $notification->post()->first()], key($notification->post()->first()->id_post))
                                @livewire('repost-status', ['post' => $notification->post()->first()], key($notification->post()->first()->id_post))
                                @livewire('like-status', ['post' => $notification->post()->first()], key($notification->post()->first()->id_post))
                                @livewire('post-modal-publish', ['post' => $notification->post()->first()], key($notification->post()->first()->id_post))
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="empty">
            <h1 class="empty__text">{{ __('notification.You havent notification') }}</h1>
        </div>
    @endif
</div>