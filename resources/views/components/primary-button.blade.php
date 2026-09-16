<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mg-btn mg-btn-primary']) }}>
    {{ $slot }}
</button>
