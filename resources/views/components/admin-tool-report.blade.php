<div class="admin__tool--element">
    <div class="admin__element--header">
        <h1>Reports</h1>
    </div>
    <div class="admin__element--main">
        @foreach ($reports->where('completed', false) as $report)
            <div class="admin__repost--main">
                <div class="admin__main--profile">
                    <div class="admin__profile--image">
                        <img class="admin__image" src="http://localhost/freedom/public/storage/{{ $report->user()->first()->profile_image }}" alt="Profile Image" />
                    </div>
                    <div class="admin__profile--text">
                        <h2 class="admin__text--name">{{ $report->user()->first()->name }}</h2>
                        <span class="admin__text--username">{{ __('@') }}{{ $report->user()->first()->username }}</span>
                    </div>
                </div>
                <div class="admin__main--reason">
                    <p class="admin__reason--text">{{ $report->reason }}</p>
                </div>
                <div class="admin__main--options">
                    @livewire('report-complete', ['report' => $report])
                </div>
            </div>
        @endforeach
    </div>
</div>
