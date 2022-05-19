<div>
    <button class="warning__delete--button" wire:click="$set('modal', true)"><span class="warning__delete--icon material-symbols-rounded">delete</span></button>

    @if ($modal)
        <div class="warning__delete--modal">
            <div class="warning__modal--container">
                <div class="warning__modal--header">
                    <h1 class="warning__header--title">Seguro que desea eliminar el warning {{ $warning->id_warning }}</h1>
                </div>
                <div class="warning__modal--body">
                    
                </div>
                <div class="warninig__modal--footer">
                    
                </div>
            </div>
            <div class="warning__modal--close" wire:click="$set('modal', false)">

            </div>
        </div>
    @endif
</div>
