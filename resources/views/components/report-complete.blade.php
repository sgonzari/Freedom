<div>
    <button class="admin__option--element" wire:click="$set('interfaceReport', true)"><span class="admin__element--icon material-symbols-rounded">visibility</span></button>

    @if ($interfaceReport)
        <div class="report__modal--main">
            <div class="report__modal--container">
                <div class="report__main--header">
                    <h1>{{ $report->id_report }} | Report by: {{ __('@') }}{{ $report->user()->first()->username }}</h1>
                </div>
                <div class="report__main--body">
                    <div class="report__body--post">
                        <div class="report__post--image">
                            <img class="report__image" src="http://localhost/freedom/public/storage/{{ $post->user()->first()->profile_image }}" alt="Imagen de perfil">
                        </div>
                        <div class="report__post--main">
                            <div class="report__post--profile">
                                <div class="report__profile--info">
                                    <span class="report__profile--name">{{ $post->user()->first()->name }}</span>
                                    <span class="report__profile--username">{{ __('@') }}{{ $post->user()->first()->username }}</span>
                                </div>
                            </div>
                            <div class="report__post--content">
                                <p class="report__content--text">{{ $post->content }}</p>
                                @if ($post->image)
                                <div class="report__content--image">
                                    <img class="content__image" src="http://localhost/freedom/public/storage/{{ $post->image }}" />
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="report__main--footer">
                    <div class="report__footer--left">
                        <button class="report__footer--element report__footer--cancel" wire:click="closeReportModal">Cerrar</button>
                    </div>
                    <div class="report__footer--right">
                        @livewire('warning-create', ['user' => $post->user()->first()], key($post->user()->first()->id_user))
                        @if (!$report->completed)
                        <button class="report__footer--element report__footer--uncomplete" wire:click="completeReport">No Completado</button>
                        @else
                        <button class="report__footer--element report__footer--complete" wire:click="uncompleteReport">Completado</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="report__modal--close" wire:click="closeReportModal"></div>
        </div>
    @endif
</div>
