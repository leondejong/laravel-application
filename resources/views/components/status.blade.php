@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'status info']) }}>
        {{ $status }}
    </div>
@endif
