<div class="form-group">
    @if(isset($label))
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    @endif
    
    @if(!empty($value))
        <div class="mb-2">
            <img src="{{ asset('uploads/' . $value) }}" alt="Preview" class="img-thumbnail" style="max-height: 150px;">
        </div>
    @endif

    <div class="custom-file">
        <input 
            type="file" 
            name="{{ $name }}" 
            id="{{ $id ?? $name }}" 
            class="custom-file-input @error($name) is-invalid @enderror" 
            accept="image/*"
            {{ $attributes ?? '' }}
        >
        <label class="custom-file-label" for="{{ $id ?? $name }}">Choose image...</label>
        
        @error($name)
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
