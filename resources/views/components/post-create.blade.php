<div>
    <form wire:submit.prevent="store">
        <x-label value="Contenido:"/>
        <x-input type="text" placeholder="What's happening?" wire:model.defer="content"/>
        <h1>{{ $content }}</h1>
        <button type="submit">Enviar</button>
    </form>
</div>