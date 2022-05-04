<div>
    <h1>Post de: {{ $user->username }}</h1>
    <p>Contenido: {{ $post->content }}</p>
    <h2>Publicado el día: {{ $post->created_at->format('d/m/Y') }}</h2>

    <div>
        @if (!empty($comments))
            <h1>Comentarios: </h1>
            @foreach ($comments as $comment)
                <div>
                    <h1>Comentario de: {{ $comment->user()->first()->username }}</h1>
                    <p>Contenido del comentario: {{ $comment->content }}</p>
                    <h2>Publicado el día: {{ $comment->created_at->format('d/m/Y') }}</h2>
                </div>
            @endforeach
        @else
            <h1>Este post no tiene comentarios.</h1>
        @endif
    </div>

    <div>
        <form wire:submit.prevent="store">
            <x-label value="Comentar:"/>
            <x-input type="text" placeholder="Comment here" wire:model.defer="contentComment"/>
            <button type="submit">Enviar</button>
        </form>
    </div>
</div>
