@props([
    'label',
    'name',
    'defaultValue' => '',
])

<div class="mb-3">
    <strong><label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input 
        type="text" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        class="form-control @error($name) is-invalid @enderror" 
        value="{{ $errors->any() ? old($name) : $defaultValue }}"
    > </strong>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
   