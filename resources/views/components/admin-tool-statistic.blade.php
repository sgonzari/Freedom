<div class="admin__tool--element">
    <div class="admin__element--header">
        <span class="admin__header--icon material-symbols-rounded"> search </span>
        <select class="admin__header--select" wire:model="optionSelected" >
            <option selected hidden>{{ __('admin.select Option') }}</option>
            @foreach ($options as $option)
                <option value="{{ $option }}">{{ __('admin.'. $option) }}</option>
            @endforeach
        </select>
    </div>
    <div class="admin__element--main">
        <div class="admin__statistic--main">
            <canvas id="canvasStatistic" class="admin__statistic--canvas"></canvas>
        </div>
    </div>
</div>
