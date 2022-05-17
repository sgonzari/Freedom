<div>
    <button class="admin__option--element" wire:click="$set('interfaceWarning', true)"><span class="admin__element--icon material-symbols-rounded">warning</span></button>

    @if ($interfaceWarning)
    <div class="warning__modal--main">
        <div class="warning__modal--container">
            <div class="warning__main--header">
                <h1>Warning User</h1>
            </div>
            <div class="warning__main--body">
                <form wire:submit.prevent="storeWarning">
                    <label for="username">Usuario:</label>
                    <input name="username" type="text" value="{{ $user->username }}" disabled/>
                    <br/>
                    <label for="message">Aviso:</label>
                    <input name="message" wire:model.defer="message" type="text" autofocus/>
                    <input type="submit" style="display:none"/>
                </form>
            </div>
            <div class="warning__main--footer">
                <button wire:click="$set('interfaceWarning', false)">Cancelar</button>
                <button wire:click="storeWarning">Enviar</button>
            </div>
        </div>
        <div class="warning__modal--close" wire:click="$set('interfaceWarning', false)"></div>
    </div>
    @endif
</div>
