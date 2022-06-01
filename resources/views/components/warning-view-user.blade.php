<div>
    @if ($warningUser)
    <div class="warning__view--modal">
        <div class="warning__view--container">
            <div class="warning__container--header">
                <h2 class="warning__header--title">{{ __('app.Warning') }} <span class="warning__count--{{ Auth::user()->warnings()->count() }}">{{ Auth::user()->warnings()->count() }}</span>/3</h2>
                @if (Auth::user()->warnings()->where('opened', false)->count() > 1)
                    <p class="warning__header--description">{{ __('app.You have been advice by administrator for the next reasons') }}:</p>
                @else
                    <p class="warning__header--description">{{ __('app.You have been advice by administrator for the next reason') }}:</p>
                @endif
            </div>
            <div class="warning__container--body">
                @foreach (Auth::user()->warnings()->where('opened', false)->get() as $warning)
                <div class="warning">
                    <div class="warning__profile">
                        <img loading="lazy" class="warning__profile--image" src="{{ asset('storage/'.$warning->reportedBy()->first()->profile_image) }}" alt="{{ __('image.Profiles image') }}" />
                    </div>
                    <div class="warning__main">
                        <div class="warning__main--header">
                            <h2 class="warning__header--name">{{ $warning->reportedBy()->first()->name }} <span class="warning__header--username">{{ __('@') }}{{ $warning->reportedBy()->first()->username }}</span></h2>
                        </div>
                        <div class="warning__main--body">
                            <p class="warning__body--reason">{!! nl2br(e($warning->reason)) !!}</p>
                        </div>
                    </div>
                </div> 
                @endforeach
                @if (Auth::user()->warnings()->count() >= 3)
                    <div class="banned">
                        <h1 class="banned__text">
                            {{ __('admin.Banned text') }}
                        </h1>
                    </div>
                @endif
            </div>
            <div class="warning__container--footer">
                <button class="warning__option--element" wire:click="warningsOpened">{{ __('app.Confirm') }}</button>
            </div>
        </div>
    </div>
    @endif
</div>
