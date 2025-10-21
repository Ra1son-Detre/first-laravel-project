@props([
    'label',
    'name',
    'defaultValue' => '',
])

<div class="mb-3">
    @if($label)
        <label for="{{ $name }}" class="form-label"><strong>{{ $label }}</strong></label>
    @endif

    <input 
        type="text" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        class="form-control @error($name) is-invalid @enderror" 
        value="{{ old($name, $defaultValue) }}"
    >

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
   