<div>
    <button class="admin__option--element" wire:click="$set('interfaceReport', true)"><span class="admin__element--icon material-symbols-rounded">visibility</span></button>

    @if ($interfaceReport)
        <div class="report__modal--main">
            <div class="report__modal--container">
                <div class="report__main--header">
                    <h1>{{ $report->id_report }}.- Report | {{ __('@') }}{{ $report->user()->first()->username }}</h1>
                </div>
                <div class="report__main--body">
                    <div class="report__body--post">
                        <div class="report__post--image">
                            <img src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="">
                        </div>
                        <div class="report__post--main">
                            <div class="report__post--profile">
                                <h2 class="report__profile--name">{{ $post->user()->first()->name }}</h2>
                                <span class="report__profile--username">{{ __('@') }}{{ $post->user()->first()->username }}</span>
                            </div>
                            <div class="report__post--content">
                                <p class="report__content--text">{{ $post->content }}</p>
                            </div>
                            @if ($post->image)
                                <a class="report__post--image" href="http://localhost/freedom/public/storage/{{ $post->image }}">http://localhost/freedom/public/storage/{{ $post->image }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="report__main--footer">
                    <button wire:click="$set('interfaceReport', false)">Cerrar</button>
                    @livewire('warning-create', ['user' => $post->user()->first()]))
                    <button>Completado</button>
                </div>
            </div>
            <div class="report__modal--close" wire:click="$set('interfaceReport', false)"></div>
        </div>
    @endif
</div>
