<div class="custom-control custom-switch form-group">
    <input 
        type="checkbox" 
        name="{{ $name }}" 
        id="{{ $id ?? $name }}" 
        class="custom-control-input @error($name) is-invalid @enderror" 
        value="1" 
        {{ old($name, $checked ?? false) ? 'checked' : '' }}
        {{ $attributes ?? '' }}
    >
    <label class="custom-control-label" for="{{ $id ?? $name }}">{{ $label ?? '' }}</label>
    @error($name)
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
