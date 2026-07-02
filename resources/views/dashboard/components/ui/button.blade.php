<button type="{{ $type ?? 'submit' }}" class="btn {{ $class ?? 'btn-primary' }}" {{ $attributes ?? '' }}>
    {{ $text ?? ($slot ?? 'Submit') }}
</button>
