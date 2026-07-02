<span class="badge badge-{{ $type ?? 'secondary' }} {{ $class ?? '' }}" {{ $attributes ?? '' }}>
    {{ $text ?? ($slot ?? '') }}
</span>
