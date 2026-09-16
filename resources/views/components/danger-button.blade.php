<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mg-btn mg-btn-danger']) }}>
    {{ $slot }}
</button>
