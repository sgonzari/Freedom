<div class="admin__tool--element">
    <div class="admin__element--container">
        @if ($optionSelected)
            <button class="admin__element--button" wire:click="lessYear">
                <span class="admin__button--icon material-symbols-rounded">chevron_left</span>
            </button>
        @endif
        <div class="admin__element--header">
            <span class="admin__header--icon material-symbols-rounded"> search </span>
            <select class="admin__header--select" wire:model="optionSelected" >
                <option selected hidden>{{ __('admin.select Option') }}</option>
                @foreach ($options as $option)
                    <option value="{{ $option }}">{{ __('admin.'. $option) }}</option>
                @endforeach
            </select>
        </div>
        @if ($optionSelected)
            <button class="admin__element--button" wire:click="moreYear" @if ($year >= date('Y')) disabled @endif>
                <span class="admin__button--icon material-symbols-rounded">chevron_right</span>
            </button>
        @endif
    </div>
    <div class="admin__element--main">
        <div class="admin__statistic--main">
            @if ($optionSelected) 
                <h1 class="admin__statistic--title">{{ __('admin.'. $optionSelected.' Statistics') }} - {{ $year }}</h1>
            @endif
            <canvas id="canvasStatistic" class="admin__statistic--canvas"></canvas>
        </div>
    </div>
</div>
