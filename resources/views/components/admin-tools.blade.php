<div class="admin__tool">
    <div class="admin__tool--nav">
        <div class="admin__nav--element @if ($option === 'report') active @else not-active @endif" wire:click="$set('option', 'report')">
            <h2 class="admin__nav--text">{{ __('admin.Reports') }}</h2>
        </div>
        <div class="admin__nav--element @if ($option === 'group') active @else not-active @endif" wire:click="$set('option', 'group')">
            <h2 class="admin__nav--text">{{ __('admin.Groups') }}</h2>
        </div>
        <div class="admin__nav--element @if ($option === 'warning') active @else not-active @endif" wire:click="$set('option', 'warning')">
            <h2 class="admin__nav--text">{{ __('admin.Warnings') }}</h2>
        </div>
        <div class="admin__nav--element @if ($option === 'stat') active @else not-active @endif" wire:click="$set('option', 'stat')">
            <h2 class="admin__nav--text">{{ __('admin.Stats') }}</h2>
        </div>
    </div>
    <div class="admin__tool--container">
        @switch ($option)
            @case('report')
                @livewire('admin-tool-report')
                @break
            @case('group')
                @livewire('admin-tool-group')
                @break
            @case('warning')
                @livewire('admin-tool-warning')
                @break
        @endswitch
    </div>
</div>
