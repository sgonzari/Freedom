<div>
    <button wire:click="$set('interfaceWarning', true)">Editar</button>

    <x-dialog-modal wire:model="interfaceWarning">
        <x-slot name="title">
            Reportar usuario
        </x-slot>
        <x-slot name="content">
            <form wire:submit.prevent="storeWarning">
                <label for="username">Usuario:</label>
                <input name="username" type="text" value="{{ $user->username }}" disabled/>
                <br/>
                <label for="message">Aviso:</label>
                <input name="message" wire:model.defer="message" type="text"/>
                <input type="submit" style="display:none"/>
            </form>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('interfaceWarning', false)">Cancelar</button>
            <button wire:click="storeWarning">Enviar</button>
        </x-slot>
    </x-dialog-modal>
</div>
