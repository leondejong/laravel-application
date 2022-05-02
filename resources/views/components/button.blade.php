<button {{ $attributes->merge(['type' => 'button', 'class' => 'input button']) }}>
    {{ $slot }}
</button>
