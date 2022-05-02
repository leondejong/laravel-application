@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'errors failure']) }}>
        <div class="errors__title">
            {{ __('Errors:') }}
        </div>

        <ul class="errors__list">
            @foreach ($errors->all() as $error)
                <li class="errors__item">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
