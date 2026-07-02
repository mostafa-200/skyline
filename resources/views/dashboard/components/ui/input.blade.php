<div class="form-group">
    @if(isset($label))
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    @endif
    <input 
        type="{{ $type ?? 'text' }}" 
        name="{{ $name }}" 
        id="{{ $id ?? $name }}" 
        class="form-control @error($name) is-invalid @enderror" 
        value="{{ old($name, $value ?? '') }}" 
        placeholder="{{ $placeholder ?? '' }}" 
        {{ ($required ?? false) ? 'required' : '' }}
        {{ $attributes ?? '' }}
    >
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
