<button {{ $attributes->merge(['type' => 'button', 'class' => 'mg-btn mg-btn-secondary']) }}>
    {{ $slot }}
</button>
