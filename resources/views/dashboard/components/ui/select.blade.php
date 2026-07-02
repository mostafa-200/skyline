<div class="form-group">
    @if(isset($label))
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    @endif
    <select 
        name="{{ $name }}" 
        id="{{ $id ?? $name }}" 
        class="form-control @error($name) is-invalid @enderror" 
        {{ ($required ?? false) ? 'required' : '' }}
        {{ $attributes ?? '' }}
    >
        @foreach($options ?? [] as $valKey => $optionLabel)
            <option value="{{ $valKey }}" {{ (string)old($name, $value ?? '') === (string)$valKey ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
