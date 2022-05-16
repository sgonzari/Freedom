@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="card__error--title">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="card_error--list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
