<div>
    @if (!empty($notifications))
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
                            <img class="notification__image" src="http://localhost/freedom/public/storage/{{ $notification->user()->first()->profile_image }}" alt="Imagen de perfil"/>
                        </a>
                        <div class="notification__header--text">
                            <h3 class="notification__text">
                                <a href="{{ route('profile', ['username' => $notification->user()->first()->username]) }}">
                                    <span class="notification__text--username">
                                        {{ $notification->user()->get()->first()->name }} 
                                    </span>
                                </a>
                                @if ($notification->typeOf()->get()->first()->name == 'like')
                                    le ha gustado tu post.
                                @elseif ($notification->typeOf()->get()->first()->name == 'repost')
                                    ha reposteado tu post.
                                @elseif ($notification->typeOf()->get()->first()->name == 'comment')
                                    ha comentado tu post.
                                @elseif ($notification->typeOf()->get()->first()->name == 'mention')
                                    te ha mencionado en un post.
                                @elseif ($notification->typeOf()->get()->first()->name == 'follow')
                                    te ha empezado a seguir.
                                @endif
                            </h3>
                            <p class="notification__date">{{ $notification->created_at->format('M-d') }}</p>
                        </div>
                    </div>
                    @if ($notification->fk_typeNot != 5)
                        <a href="{{ route('post', ['username' => $notification->post()->get()->first()->user()->get()->first()->username, 'id_post' => $notification->post()->get()->first()->id_post]) }}">
                            <div class="notification__main--body">
                                <p class="notification__body--text">{{ $notification->post()->first()->content }}</p>
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
        <h1 class="notification--not">No tienes notificaciones.</h1>
    @endif
</div>