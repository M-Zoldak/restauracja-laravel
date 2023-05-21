@props(['status'])

@if (!empty($status) && $status)
    <div>
        {{ $status }}
    </div>
@endif
