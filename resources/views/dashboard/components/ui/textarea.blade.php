<div class="form-group">
    @if(isset($label))
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    @endif
    <textarea 
        name="{{ $name }}" 
        id="{{ $id ?? $name }}" 
        rows="{{ $rows ?? 3 }}" 
        class="form-control @error($name) is-invalid @enderror" 
        placeholder="{{ $placeholder ?? '' }}" 
        {{ ($required ?? false) ? 'required' : '' }}
        {{ $attributes ?? '' }}
    >{{ old($name, $value ?? '') }}</textarea>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
