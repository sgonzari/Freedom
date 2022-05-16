@props(['status'])

@if ($status)
    <div {{ $attributes }}>
        {{ $status }}
    </div>
@endif
