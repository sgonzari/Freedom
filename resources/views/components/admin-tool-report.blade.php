<div class="admin__tool--element admin__tool--report">
    <div class="admin__element--header">
        <h1>{{ __('admin.Reports') }}</h1>
    </div>
    <div class="admin__element--main">
        @foreach ($reports->where('completed', false) as $report)
            <div class="admin__repost--main">
                <div class="admin__main--profile">
                    <a class="admin__profile--image" href="{{ route('profile', $report->user()->first()->username) }}" target="_blank">
                        <img class="admin__image" src="http://localhost/freedom/public/storage/{{ $report->user()->first()->profile_image }}" alt="{{ __('image.Profiles image') }}" />
                    </a>
                    <div class="admin__profile--text">
                        <a class="admin__text--name" href="{{ route('profile', $report->user()->first()->username) }}" target="_blank">{{ $report->user()->first()->name }}</a>
                        <span class="admin__text--username">{{ __('@') }}{{ $report->user()->first()->username }}</span>
                    </div>
                </div>
                <div class="admin__main--reason">
                    <p class="admin__reason--text">{{ $report->reason }}</p>
                </div>
                <div class="admin__main--options">
                    @livewire('report-complete', ['report' => $report], key($report->id_report))
                </div>
            </div>
        @endforeach
    </div>
</div>
